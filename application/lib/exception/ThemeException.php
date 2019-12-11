<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2019/12/11
 * Time: 22:19
 */

namespace app\lib\exception;


class ThemeException extends BaseException {
    public $code = 404;
    public $msg  = '指定主题不存在，请检查主题ID';
    public $errorCode = 30000;
}