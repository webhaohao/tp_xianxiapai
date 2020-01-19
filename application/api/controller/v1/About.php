<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2020/1/13
 * Time: 11:23
 */

namespace app\api\controller\v1;

use app\api\model\About as AboutModel;
use app\lib\exception\SuccessMessage;

class About {
        public function createOrUpdateAbout(){

            $dataArray = input('post.');
            if(empty($dataArray['id'])){
                $About = new AboutModel();
                $About ->allowField(true)->save($dataArray);
            }
            else{
                $about = AboutModel::get($dataArray['id']);
                $about->allowField(true)->save($dataArray);
            }
            return json(new SuccessMessage(),201);
        }
        public function getAbout(){
            $about = AboutModel::get();
            if(empty($about)){
               return new \stdClass();
            }
            return $about;
        }
}