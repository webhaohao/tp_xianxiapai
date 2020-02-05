<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2020/1/31
 * Time: 18:00
 */

namespace app\lib\exception;


class ContentException extends BaseException {
    public $code = 400;
    public $msg = '内容不合法,发布不成功';
    public $errorCode = 40000;
}