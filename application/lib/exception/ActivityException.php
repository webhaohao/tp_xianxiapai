<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2020/1/12
 * Time: 20:54
 */

namespace app\lib\exception;


class ActivityException extends BaseException {
    public $code = 404;
    public $msg = '活动人数已满!';
    public $errorCode = 40000;
}