<?php
/*
 * @Author: web_haohao   
 * @Date: 2019-12-04 23:24:26 
 * @Last Modified by: mikey.zhaopeng
 * @Last Modified time: 2019-12-05 00:32:06
 */
namespace app\api\validate;

class IDMustBePostiveInt extends BaseValidate
{
    protected $rule = [
        'id'  =>  'require|isPostiveInteger'
    ];
    protected $message = [
        'id'  => 'id必须是正整数'
    ];
}