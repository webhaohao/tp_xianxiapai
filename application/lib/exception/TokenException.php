<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2019/12/27
 * Time: 22:25
 */

namespace app\lib\exception;


class TokenException extends  BaseException {
    public $code = 401;
    public $msg  = 'Token已过期或无效Token';
    public $errorCode = 10001;
}