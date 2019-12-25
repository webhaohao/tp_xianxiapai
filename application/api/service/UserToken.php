<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2019/12/13
 * Time: 12:50
 */

namespace app\api\service;


use app\lib\exception\WeChatException;
use think\Exception;
use app\api\model\User as UserModel;
class UserToken {
    protected $code;
    protected $wxAppID;
    protected $wxAppSecret;
    protected $wxLoginUrl;
    public function __construct($code){
        $this->code = $code;
        $this->wxAppID = config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');
        $this->wxLoginUrl = sprintf(config('wx.login_url'),
               $this ->wxAppID,$this->wxAppSecret,$this->code);

    }
    public function get(){
        $result = curl_get($this->wxLoginUrl);
        $wxResult = json_decode($result,true);
        if(empty($wxResult)){
            throw new Exception('获取session_key及openID时异常,微信内部异常');
        }
        else{
            $loginFail = array_key_exists('errcode',$wxResult);
            if($loginFail){
                $this -> processLoginError($wxResult);
            }
            else{
                $this ->grantToken($wxResult);
            }
        }
    }
    private function grantToken($wxResult){
        // 拿到 openid
        // 数据库看一下，这个openid是不是已经存在
        // 如果存在，则不处理，如果不存在，则新增一条
        // 准备缓存数据，写入缓存
        // 把令牌返回到客户端
        // key:: 令牌
        // value :: wxResult, uid, scope
        $openid  = $wxResult['openid'];
        $user = UserModel::getByOpenID($openid);
        if($user){
            $uid = $user ->id;
        }
        else{
            $uid = $this -> newUser($openid);
        }
        $cachedValue = $this -> prepareCachedValue($wxResult,$uid);
    }
    private function saveToCache($cachedValue){
        $key = generateToken();
    }

    private function prepareCachedValue($wxResult,$uid){
        $cachedValue['wxResult'] = $wxResult;
        $cachedValue['uid'] = $uid;
        $cachedValue['scope'] = 16;
        return $cachedValue;
    }
    private function newUser($openid){
        $user = UserModel::create([
                'openid' => $openid
        ]);
        return $user->id;
    }
    private function processLoginError($wxResult){
        throw new WeChatException([
            'msg' => $wxResult['errmsg'],
            'errorCode'=>$wxResult['errcode']
        ]);
    }
}