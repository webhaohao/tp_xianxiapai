<?php
/*
 * @Author: web_haohao
 * @Date: 2019-12-04 23:02:41 
 * @Last Modified by: mikey.zhaopeng
 * @Last Modified time: 2019-12-04 23:56:35
 */

namespace app\api\controller\v1;

use app\api\model\BannerItem;
use app\api\validate\IDMustBePostiveInt;
use app\api\model\Banner as BannerModel;
use app\api\model\BannerItem as BannerItemModel;
use app\api\model\Image  as ImageModel;
use app\lib\exception\BannerMissException;
use app\lib\exception\SuccessMessage;
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
        public function createBanner(){
            $dataArray = input('post.');
            $imageModel = new ImageModel();
            $imageModel->from = 2;
            $imageModel->url  = $dataArray['url'];
            $imageModel->save();
            $imgId = $imageModel ->id;
            $bannerItem = new BannerItem();
            $bannerItem -> img_id = $imgId;
            $bannerItem -> key_word = $dataArray['key_word'];
            $bannerItem -> banner_id = $dataArray['banner_id'];
            $bannerItem -> save();
            return json(new SuccessMessage(),201);
        }

  }
