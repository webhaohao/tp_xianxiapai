<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2020/1/13
 * Time: 13:40
 */

namespace app\lib\exception;


class AboutMissException extends BaseException {
    public $code = 404;
    public $msg = 'about内容不存在';
    public $errorCode = 40000;
}