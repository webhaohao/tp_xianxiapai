<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2020/1/2
 * Time: 12:29
 */

namespace app\api\service;

use think\Request;

class Upload {
    public  function image(){
        $config = [
            'size' => 10000000,
            'ext' => 'jpg,gif,png,bmp,jpeg,JPG'
        ];

        $request = Request::instance();
        $files = $request->file('files');
        $info = $files->rule('date')->move(ROOT_PATH . 'public' . DS . 'images');
        if($info) {
            $saveName = str_replace("\\", "/", $info->getSaveName());
        }
        return '/'.$saveName;
    }
}