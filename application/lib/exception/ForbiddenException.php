<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2019/12/30
 * Time: 13:01
 */

namespace app\lib\exception;


class ForbiddenException extends BaseException {
    public $code = 403;
    public $msg  = '权限不够';
    public $errorCode = 10001;
}