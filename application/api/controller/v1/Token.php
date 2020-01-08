<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2019/12/13
 * Time: 12:32
 */

namespace app\api\controller\v1;


use app\api\service\UserToken;
use app\api\validate\AppTokenGet;
use app\api\validate\TokenGet;

class Token {
        public function getToken($code=""){
            (new TokenGet())->goCheck();
            $ut = new UserToken($code);
            $token = $ut -> get();
            return [
                'token' => $token
            ];
        }
        /**
         * 第三方应用获取令牌
         * @url /app_token?
         * @POST ac=:ac se=:secret
         */
        public function getAppToken($ac='', $se='')
        {
            (new AppTokenGet())->goCheck();
            $app = new AppToken();
            $token = $app->get($ac, $se);
            return [
                'token' => $token
            ];
        }
}