<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2019/12/7
 * Time: 18:42
 */

namespace app\lib\exception;


use think\Exception;
use think\exception\Handle;
use think\Log;
use think\Request;

class ExceptionHandler extends Handle {
    private $code;
    private $msg;
    private $errorCode;
    //需要返回当前的请求的URL路径

    public function  render(Exception $e){
        if($e instanceof BaseException){
            // 如果是自定义的异常
            $this -> code  = $e->code;
            $this -> msg   = $e->msg;
            $this -> errorCode = $e ->errorCode;
        }
        else{
            // Config::get('app_debug');
            if(config('app_debug')){
                // return default page
                return parent::render($e);
            }
            else{
                // 不想让用户知道当前的异常
                $this -> code = 500;
                $this -> msg = '服务器内部错误，不想告诉你';
                $this -> errorCode = 999;
                // 记录错误日志
                $this->recordErrorLog($e);
            }

        }
        $request = Request::instance();
        $result = [
            'msg' => $this -> msg,
            'error_code'=> $this -> errorCode,
            'request_url' => $request -> url()
        ];
        return json($result,$this->code);
    }
    private function recordErrorLog(Exception $e){
        Log::init([
            'type'=>'File',
            'path'=>LOG_PATH,
            'level' => ['error']
        ]);
        Log::record($e->getMessage(),'error');
    }
}