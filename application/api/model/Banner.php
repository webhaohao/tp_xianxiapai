<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2019/12/7
 * Time: 18:19
 */

namespace app\api\model;


use think\Db;
use think\Exception;

class Banner {
    public static function getBannerByID($id){
        // 根据 banner id 获取banner信息
//       $result =  Db::query('select * from banner_item where banner_id = ?',[$id]);
//       return $result;
//         $result = Db::table('banner_item')
//                        -> where('banner_id','=',$id)
//                        ->select();
        // 使用闭包的方式 获取数据
         $result = Db::table('banner_item')
                 ->where(function ($query) use ($id){
                     $query -> where('banner_id','=',$id);
                 })
                ->select();
         return $result;
    }
}