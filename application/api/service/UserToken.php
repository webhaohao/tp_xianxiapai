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
        $openid  = $wxResult['openid'];
        echo $openid;
    }
    private function processLoginError($wxResult){
        throw new WeChatException([
            'msg' => $wxResult['errmsg'],
            'errorCode'=>$wxResult['errcode']
        ]);
    }
}