<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2020/1/10
 * Time: 10:16
 */

namespace app\api\model;


class News extends BaseModel {
    public function setMainImgUrlAttr($value,$data){
        $arr = explode('/', $value);
        $count = count($arr);
        return '/'.$arr[$count-2].'/'.$arr[$count-1];
    }
    public function getMainImgUrlAttr($value,$data){
        return config('setting.img_prefix').$value;
    }
}