<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2019/12/27
 * Time: 23:59
 */

namespace app\api\model;


class ProductImage extends BaseModel{
        protected $hidden = ['img_id','delete_time','product_id'];
        public  function imgUrl(){
            return $this->belongsTo('image','img_id','id');
        }
}