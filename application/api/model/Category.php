<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2019/12/12
 * Time: 12:15
 */

namespace app\api\model;


class Category extends BaseModel {
    protected $hidden = ['delete_time','update_time'];
    public function img(){
        return $this ->belongsTo('Image','topic_img_id','id');
    }
}