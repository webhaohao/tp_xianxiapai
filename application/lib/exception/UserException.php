<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2019/12/28
 * Time: 21:29
 */

namespace app\lib\exception;


class UserException extends BaseException {
        public $code = 404;
        public $msg  = '用户不存在';
        public $errorCode = 60000;
}