<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2020/1/1
 * Time: 17:31
 */

namespace app\lib\exception;


class OrderException extends BaseException {
    public $code = 404;
    public $msg  = '订单不存在';
    public $errorCode = 80000;
}