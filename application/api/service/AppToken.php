<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2020/1/8
 * Time: 19:28
 */

namespace app\api\service;


use app\api\model\ThirdApp;
use app\lib\exception\TokenException;

class AppToken extends Token {
    public function get($ac, $se)
    {
        $app = ThirdApp::check($ac, $se);
        if(!$app)
        {
            throw new TokenException([
                'msg' => '授权失败',
                'errorCode' => 10004
            ]);
        }
        else{
            $scope = $app->scope;
            $uid = $app->id;
            $values = [
                'scope' => $scope,
                'uid' => $uid
            ];
            $token = $this->saveToCache($values);
            return $token;
        }
    }
}