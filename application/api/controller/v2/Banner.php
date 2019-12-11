<?php
/*
 * @Author: web_haohao
 * @Date: 2019-12-04 23:02:41 
 * @Last Modified by: mikey.zhaopeng
 * @Last Modified time: 2019-12-04 23:56:35
 */

namespace app\api\controller\v2;

use app\api\validate\IDMustBePostiveInt;
use app\api\model\Banner as BannerModel;
use app\lib\exception\BannerMissException;
use think\Exception;

class Banner
  {

        public function getBanner($id)
            {

                return 'this is v2 version';
            }

  }
