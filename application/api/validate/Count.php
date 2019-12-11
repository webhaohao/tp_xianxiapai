<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2019/12/11
 * Time: 23:36
 */

namespace app\api\validate;


class Count extends BaseValidate {
        protected $rule = [
            'count' => 'isPostiveInteger|between:1,15'
        ];

}