<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2019/12/13
 * Time: 12:59
 */
return [
    'app_id'=>'wx6482463f3c6575c3',
    'app_secret'=>'4fe9616535f724db87a447b11d0a85eb',
    'login_url' =>"https://api.weixin.qq.com/sns/jscode2session?appid=%s&secret=%s&js_code=%s&grant_type=authorization_code",
    'getAccessToken_url'=>"https://api.weixin.qq.com/cgi-bin/token?appid=%s&secret=%s&grant_type=client_credential",
    'msgSecCheck_url' => "https://api.weixin.qq.com/wxa/msg_sec_check?access_token=%s",
    'imgSecCheck_url' => "https://api.weixin.qq.com/wxa/img_sec_check?access_token=%s"
];