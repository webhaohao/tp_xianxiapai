<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2019/12/13
 * Time: 12:44
 */

namespace app\api\model;


class User extends BaseModel {
        public static  function getByOpenID($openid){
            $user = self :: wbere('openid','=',$openid)
                            ->find();

            return $user;

        }
}