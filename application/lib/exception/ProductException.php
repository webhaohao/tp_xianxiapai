<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2019/12/11
 * Time: 23:53
 */

namespace app\lib\exception;


class ProductException extends BaseExceptions{
    public $code = 404;
    public $msg  = '指定的商品不存在，请检查参数';
    public $errorCode = 20000;
}