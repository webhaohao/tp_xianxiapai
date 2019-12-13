<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2019/12/13
 * Time: 12:34
 */

namespace app\api\validate;


class TokenGet extends BaseValidate{
        protected $rule =[
            'code' => 'require|isNotEmpty'
        ];
        protected $message = [
            'code' => '没有code还想获取token!!!'
        ];
}