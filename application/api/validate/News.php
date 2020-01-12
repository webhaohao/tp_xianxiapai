<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2020/1/10
 * Time: 10:41
 */

namespace app\api\validate;


class News extends BaseValidate{
    protected $rule = [
        'title' => 'require|isNotEmpty',
        'abstract'=>'require|isNotEmpty',
        'detail' => 'require|isNotEmpty',
        'category_id'=>'require|isNotEmpty',
        'main_img_url'=>'require|isNotEmpty'
    ];
}