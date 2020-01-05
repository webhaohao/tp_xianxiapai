<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2020/1/5
 * Time: 13:22
 */

namespace app\api\validate;


class UserUpdate extends BaseValidate {
    protected $rule = [
        'avatar' => 'require|isNotEmpty',
        'nickname' => 'require|isNotEmpty'
    ];
}