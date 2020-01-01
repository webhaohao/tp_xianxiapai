<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2020/1/1
 * Time: 23:50
 */

namespace app\api\controller\v1;


use think\Request;

class Upload {
        public  function image(){
            $config = [
                'size' => 10000000,
                'ext' => 'jpg,gif,png,bmp,jpeg,JPG'
            ];

            $request = Request::instance();
            var_dump($request->file('files'));
        }
}