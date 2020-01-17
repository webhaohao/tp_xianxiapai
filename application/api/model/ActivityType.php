<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2020/1/16
 * Time: 13:45
 */

namespace app\api\model;


class ActivityType extends BaseModel {
        protected $hidden = ['delete_time','update_time'];
        public  function items(){
             return $this->hasMany('Category','activity_type_id','id');
        }
}