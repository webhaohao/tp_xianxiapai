<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2020/1/8
 * Time: 19:26
 */

namespace app\api\validate;


class AppTokenGet extends BaseValidate {
    protected $rule = [
        'ac' => 'require|isNotEmpty',
        'se' => 'require|isNotEmpty'
    ];
}