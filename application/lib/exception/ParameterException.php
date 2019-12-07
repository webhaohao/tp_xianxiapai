<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2019/12/7
 * Time: 22:18
 */

namespace app\lib\exception;


class ParameterException extends BaseException {
    public $code = 400;
    public $msg  = '参数错误';
    public $errorCode = 10000;
}