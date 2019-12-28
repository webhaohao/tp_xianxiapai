<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2019/12/28
 * Time: 0:02
 */

namespace app\api\model;


class ProductProperty extends  BaseModel{
    protected $hidden = ['img_id','delete_time','product_id'];
}