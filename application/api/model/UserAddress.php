<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2019/12/28
 * Time: 22:19
 */

namespace app\api\model;


class UserAddress extends BaseModel{
    protected $hidden =['id', 'delete_time', 'user_id'];
}