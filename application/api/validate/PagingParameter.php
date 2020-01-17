<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2020/1/17
 * Time: 12:36
 */

namespace app\api\validate;


class PagingParameter extends BaseValidate {
    protected $rule = [
        'page'  =>  'isPostiveInteger',
        'size'  =>  'isPostiveInteger'
    ];
    protected $message = [
        'page'  => '分页参数必须是正整数',
        'size'  => '分页参数必须是正整数'
    ];
}