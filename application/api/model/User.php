<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2019/12/13
 * Time: 12:44
 */

namespace app\api\model;


class User extends BaseModel {
        public  function address(){
            return $this->hasOne('UserAddress','user_id','id');
        }
        public static  function getByOpenID($openid){
            $user = self::where('openid','=',$openid)
                            ->find();

            return $user;
        }
        public  function activity(){
            return  $this->hasMany('Activity','user_id','id');
        }
}