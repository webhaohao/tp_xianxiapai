<?php
namespace app\api\validate;
use app\lib\exception\ParameterException;
use think\Request;
use think\Validate;
use think\Exception;
class BaseValidate extends Validate{
      public function goCheck(){
            // 获取 http 传入的参数
            // 对 参数 校验
            $request = Request::instance();
            $params = $request -> param();
            $result = $this ->batch() -> check($params);
            if(!$result){
                $e = new ParameterException(
                    [
                        'msg'=> $this -> error
                    ]
                );
//                $e -> msg = $this -> error;
//                $e -> errorCode = 10000;
                throw $e;
//                $error = $this -> error;
//                throw new Exception($error);
            }
            else{
                return true;
            }
      }
      protected function isPostiveInteger($value, $rule='', $data='', $field='')
        {
            if(is_numeric($value) && is_int($value + 0) && ($value + 0) > 0)
            {
                return true;
            }
            else{
                return false;
            }
        }
}