<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2020/1/17
 * Time: 10:25
 */

namespace app\api\model;


class Order extends BaseModel {
        protected $hidden = ['user_id','delete_time','update_time'];
        protected $autoWriteTimestamp = true;
        // protected $createTime = 'create_timestamp';
        public static function getSummaryByUser($uid,$page=1,$size=15){
           $pagingData = self::where('user_id','=',$uid)
                ->order('create_time desc')
                ->paginate($size,true,['page'=>$page]);
            return $pagingData;
        }
}