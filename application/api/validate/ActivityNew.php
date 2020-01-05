<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2020/1/1
 * Time: 12:56
 */

namespace app\api\validate;


class ActivityNew extends BaseValidate {
    protected $rule = [
        'title' => 'require|isNotEmpty',
        'start_time' => 'require|isNotEmpty',
        'end_time' => 'require|isNotEmpty',
        'location' => 'require|isNotEmpty',
        'number' => 'require|isNotEmpty',
        'detail' => 'require|isNotEmpty',
        'category_id'=>'require|isNotEmpty',
        'main_img_url'=>'require|isNotEmpty'
    ];
}