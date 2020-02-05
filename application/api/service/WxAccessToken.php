<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2020/1/31
 * Time: 10:28
 */

namespace app\api\service;


use app\lib\exception\WeChatException;
use think\Cache;

class WxAccessToken {
    protected $wxAppID;
    protected $wxAppSecret;
    protected $wxGetAccessTokenUrl;
    public function __construct(){
        $this->wxAppID = config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');
        $this->wxGetAccessTokenUrl = sprintf(config('wx.getAccessToken_url'),
            $this ->wxAppID,$this->wxAppSecret);
    }
    public function get(){
        $accessToken = Cache::get('accessToken');
        if(!$accessToken){
            $result = curl_get($this->wxGetAccessTokenUrl);
            $wxResult = json_decode($result,true);
            if(empty($wxResult)){
                throw new Exception('获取AccessToken错误,微信内部问题！');
            }
            else{
                $isExistErrorMsg = array_key_exists('errcode',$wxResult);
                if($isExistErrorMsg){
                    $this -> processAccessTokenError($wxResult);
                }
                else{
                    cache('accessToken',$wxResult['access_token'],$wxResult['expires_in']);
                }
            }
        }
        return false;
    }
    private function processAccessTokenError($wxResult){
        throw new WeChatException([
            'msg' => $wxResult['errmsg'],
            'errorCode'=>$wxResult['errcode']
        ]);
    }
}