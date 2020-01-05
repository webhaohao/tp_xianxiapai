<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2020/1/1
 * Time: 13:03
 */

namespace app\api\model;


class Activity extends BaseModel{
        public  static function getActivityByScope($scope){
            $list = self::all(['scope'=>$scope]);
            $ids = [];
            foreach($list as $key=>$activity){
                array_push($ids,$activity->id);
            }
            $activity = self::with(['items','items.img'])->select($ids);
            return $activity;
        }
//        public function catories(){
//            return $this->hasOne('Category');
//        }
        public function items(){
            return $this -> hasMany('ActivityImage','activity_id','id');
        }
        // 获取器
        public function getMainImgUrlAttr($value,$data){
            return config('setting.img_prefix').$value;
        }
        public function getStartTimeAttr($value,$data){
            return date('Y-m-d H:i',$value);
        }
        public function getEndTimeAttr($value,$data){
            return date('Y-m-d H:i',$value);
        }
        // 修改器
        public function setStartTimeAttr($value,$data){
            return strtotime($value);
        }
        public function setEndTimeAttr($value,$data){
            return strtotime($value);
        }
        public function setMainImgUrlAttr($value,$data){
            $arr = explode('/', $value);
            $count = count($arr);
            return '/'.$arr[$count-2].'/'.$arr[$count-1];
        }
        public function setIntegralAttr($value,$data){
            $value = 10;
            return $value;
        }
}