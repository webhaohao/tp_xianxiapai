<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2020/1/9
 * Time: 13:52
 */

namespace app\api\controller\v1;


class ThirdApp {
        public  function getThirdAppInfo($token){
            return [
                'roles' => 'admin'
            ];
        }
}