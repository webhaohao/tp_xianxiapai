<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2019/12/11
 * Time: 23:33
 */

namespace app\api\controller\v1;


use app\api\validate\Count;
use app\api\model\Product as ProductModel;
use app\api\validate\IDMustBePostiveInt;

class Product  {
    public function getRecent($count = 15){
        (new Count())->goCheck();
        $products = ProductModel::getMostRecent($count);
        if($products->isEmpty()){
             throw new ProductException();
        }
        $products = $products -> hidden(['summary']);
        return $products;
    }
    public function getAllInCategory($id){
        (new IDMustBePostiveInt())->goCheck();
        $products = ProductModel::getProductByCategroyID($id);
        if($products->isEmpty()){
            throw new ProductException();
        }
        $products = $products -> hidden(['summary']);
        return $products;
    }
}