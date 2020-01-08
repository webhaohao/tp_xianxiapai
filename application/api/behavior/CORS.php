<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2020/1/8
 * Time: 23:06
 */

namespace app\api\behavior;


class CORS {
    public function appInit(&$params)
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: token,Origin, X-Requested-With, Content-Type, Accept");
        header('Access-Control-Allow-Methods: POST,GET');
        if(request()->isOptions()){
            exit();
        }
    }
}