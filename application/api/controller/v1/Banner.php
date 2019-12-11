<?php
/*
 * @Author: web_haohao
 * @Date: 2019-12-04 23:02:41 
 * @Last Modified by: mikey.zhaopeng
 * @Last Modified time: 2019-12-04 23:56:35
 */

namespace app\api\controller\v1;

use app\api\validate\IDMustBePostiveInt;
use app\api\model\Banner as BannerModel;
use app\lib\exception\BannerMissException;
use think\Exception;

class Banner
  {

        public function getBanner($id)
            {
                // AOP 面向切面编程
                (new IDMustBePostiveInt()) -> goCheck();
                $banner = BannerModel::getBannerByID($id);
                // $banner -> hidden(['update_time','delete_time']);
//                $banner -> visible(['id','update_time']);
//                $data = $banner ->toArray();
//                unset($data['delete_time']);
                //$banner = BannerModel::with(['items','items.img'])->find($id);
                if(!$banner){
                   throw new BannerMissException();
                }
                return $banner;
            }

  }
