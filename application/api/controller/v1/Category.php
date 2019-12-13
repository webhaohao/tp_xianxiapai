<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2019/12/12
 * Time: 12:14
 */

namespace app\api\controller\v1;

use app\api\model\Category as CategoryModel;
use app\lib\exception\CategoryException;


class Category {
    public function getAllCategories()
    {
        $categories = CategoryModel::all([],'img');
        if($categories->isEmpty()){
            throw new CategoryException();
        }
        return $categories;
    }
}