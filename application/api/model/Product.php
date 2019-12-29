<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2019/12/11
 * Time: 12:54
 */

namespace app\api\model;


class Product extends BaseModel {
        protected $hidden = ['delete_time','create_time','update_time','pivot'];
        public function getMainImgUrlAttr($value,$data){
            return $this->prefixImgUrl($value,$data);
        }
        public function imgs(){
            return $this-> hasMany('ProductImage','product_id','id');
        }
        public function properties(){
            return $this-> hasMany('ProductProperty','product_id','id');
        }
        public static function getMostRecent($count){
            $products = self::limit($count)
                ->order('create_time desc')
                ->select();
            return $products;
        }
        public static function getProductByCategroyID($categoryID){
            $products = self::where('category_id','=',$categoryID)
                        ->select();
            return $products;
        }
        public static  function getProductDetail($id){
            $products = self::with(['imgs'=>function($query){
                                   $query->with(['imgUrl'])
                                   ->order('order','asc')
                                   ;
                             }])
                            ->with(['properties'])
                            ->find($id);
            return $products;
        }
        public function deleteOne($id){

        }
}