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
      protected function isNotEmpty($value, $rule='', $data='', $field=''){
            if(empty($value)){
                  return false;
              }
              else{
                  return true;
            }
      }
    //没有使用TP的正则验证，集中在一处方便以后修改
    //不推荐使用正则，因为复用性太差
    //手机号的验证规则
    protected function isMobile($value)
    {
        $rule = '^1(3|4|5|7|8)[0-9]\d{8}$^';
        $result = preg_match($rule, $value);
        if ($result) {
            return true;
        } else {
            return false;
        }
     }
      public  function getDataByRule($arrays){
          if (array_key_exists('user_id', $arrays) | array_key_exists('uid', $arrays)) {
              // 不允许包含user_id或者uid，防止恶意覆盖user_id外键
              throw new ParameterException([
                  'msg' => '参数中包含有非法的参数名user_id或者uid'
              ]);
          }
          $newArray = [];
          foreach ($this->rule as $key => $value) {
              $newArray[$key] = $arrays[$key];
          }
          return $newArray;
      }
}