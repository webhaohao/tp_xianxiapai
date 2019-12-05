<?php
/*
 * @Author: web_haohao
 * @Date: 2019-12-04 23:02:41 
 * @Last Modified by: mikey.zhaopeng
 * @Last Modified time: 2019-12-04 23:56:35
 */

namespace app\api\controller\v1;

use app\api\validate\IDMustBePostiveInt;

class Banner
  {     
        public function getBanner($id)
        {
            (new IDMustBePostiveInt()) -> goCheck();
        }
        
  }
