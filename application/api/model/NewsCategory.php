<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2020/1/10
 * Time: 10:19
 */

namespace app\api\model;


class NewsCategory extends BaseModel {
    protected $hidden = ['delete_time','update_time'];
    public function img(){
        return $this ->belongsTo('Image','topic_img_id','id');
    }
}