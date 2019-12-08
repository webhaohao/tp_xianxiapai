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
       $result =  Db::query('select * from banner_item where banner_id = ?',[$id]);
       return $result;
    }
}