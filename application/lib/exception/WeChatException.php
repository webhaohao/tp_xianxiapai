<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2019/12/14
 * Time: 0:19
 */

namespace app\lib\exception;


class WeChatException extends BaseException{
    public $code = 400;
    public $msg  = '微信服务器端口调用实现';
    public $errorCode = 999;

}