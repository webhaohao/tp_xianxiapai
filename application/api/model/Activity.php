<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2020/1/1
 * Time: 13:03
 */

namespace app\api\model;


class Activity extends BaseModel{
        protected $autoWriteTimestamp = true;
        public  static function getActivitesByFilter($id,$tab_item_active,$categoryId,$page,$size){
            $map=[];
            if($id>0){
                $map['activity_type_id'] =$id;
            }
            if($categoryId>0){
                $map['category_id'] = $categoryId;
            }
            if($tab_item_active == '按热度'){
                $activity = self::where($map)->order('join_people desc')->paginate($size,false,['page'=>$page]);
            }
            else if($tab_item_active == '按时间'){
                $activity = self::where($map)->order('create_time desc')->paginate($size,false,['page'=>$page]);
            }
            else{
                $activity = self::where($map)->order('integral desc')->paginate($size,false,['page'=>$page]);
            }

            return $activity;
        }
        public static function getDetailByActivityId($id){
            return self::with(['users','category','items','items.img'])->find($id);
        }
        public function items(){
            return $this -> hasMany('ActivityImage','activity_id','id');
        }

        public function users(){
            return $this->belongsToMany('User', 'user_activity', 'user_id', 'activity_id');
        }
        public function category(){
            return $this->belongsTo('Category','category_id','id');
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