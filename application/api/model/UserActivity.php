<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2020/1/7
 * Time: 19:21
 */

namespace app\api\model;


class UserActivity extends BaseModel {
        public static function check($userId,$activityId){
           return self::where('user_id','=',$userId)
                ->where('activity_id','=',$activityId)
                ->find();
        }
        public static function getCountByActivityId($id){
          return self::where('activity_id','=',$id)->count();
        }
}