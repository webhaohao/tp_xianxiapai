<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2020/1/31
 * Time: 11:09
 */

namespace app\api\service;

use think\Cache;

class ContentCheck {
      protected $accessToken;
      protected $wxMsgSecCheckUrl;
      public function __construct(){
             $wxAccessToken = new WxAccessToken();
             $wxAccessToken ->get();
             $this->accessToken = Cache::get('accessToken');
             $this->wxMsgSecCheckUrl =sprintf(config('wx.msgSecCheck_url'),
                    $this->accessToken);
             $this->wxImgSecCheckUrl = sprintf(config('wx.imgSecCheck_url'),
                 $this->accessToken);

      }
      public function verifyMsg($content){
          $result=curl_post($this->wxMsgSecCheckUrl,[
              'content' => $content
          ]);
          $wxResult = json_decode($result,true);
          if($wxResult['errcode']!=0){
              return false;
          }
          return true;
      }
      public function verifyImage($file){
          $result=curl_post($this->wxImgSecCheckUrl,[
              'media' =>new \CURLFile($file)
          ],true);
          $wxResult = json_decode($result,true);
          if($wxResult['errcode']!=0){
              return false;
          }
          return true;
      }
}