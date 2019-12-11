<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2019/12/11
 * Time: 21:49
 */

namespace app\api\validate;


class IDCollection extends  BaseValidate{
        protected $rule = [
            'ids' => 'require|checkIDs'
        ];
        protected $message =[
            'ids' => 'ids参数必须是以逗号分隔的多个正整数'
        ];
        // ids = id1,id2....
        public function checkIDs($value){
              $values = explode(',',$value);
              if(empty($values)){
                  return false;
              }
              foreach($values as $id){
                  if(!$this->isPostiveInteger($id)){
                      return false;
                  }
              }
              return true;
        }
}