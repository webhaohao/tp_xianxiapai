<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2019/12/12
 * Time: 12:26
 */

namespace app\lib\exception;


class CategoryException extends BaseException{
    public $code = 404;
    public $msg = '指定类目不存在,请检查参数';
    public $errorCode = 40000;
}