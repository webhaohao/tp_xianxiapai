<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2020/1/8
 * Time: 10:59
 */

namespace app\api\service;


use app\api\model\UserActivity;
use app\api\model\Activity as ActivityModel;

class Activity {
        // 用户参加活动
        // 判断活动是否人数已满
        // 如果已满,返回消息
        // 如果没有满,插入user_activity表
        public function userJoinActivity($id){
            $JoinUsers_num=UserActivity::getCountByActivityId($id);
            $activity = ActivityModel::get($id);
            if($JoinUsers_num>=$activity['number']){
                return false;
            }
            return true;
        }
}