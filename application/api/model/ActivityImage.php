<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2020/1/4
 * Time: 13:49
 */

namespace app\api\model;


class ActivityImage extends BaseModel {
    public  function img(){
        return $this -> belongsTo('Image','img_id','id');
    }
}