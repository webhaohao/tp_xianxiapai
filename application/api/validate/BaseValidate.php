<?php
namespace app\api\validate;
use think\Request;
use think\Validate;
use think\Exception;
class BaseValidate extends Validate{
      public function goCheck(){
            // 获取 http 传入的参数
            // 对 参数 校验
            $request = Request::instance();
            $params = $request -> param();
            $result = $this -> check($params);
            if(!$result){
                $error = $this -> error;
                throw new Exception($error);
            }
            else{
                return true;
            }
      }
}