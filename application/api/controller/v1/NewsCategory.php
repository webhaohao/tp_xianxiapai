<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2020/1/10
 * Time: 10:19
 */

namespace app\api\controller\v1;

use app\api\model\NewsCategory as NewsCategoryModel;

class NewsCategory {
    public function getAllNewsCategories()
    {
        $categories = NewsCategoryModel::all([],'img');
        if($categories->isEmpty()){
            throw new CategoryException();
        }
        return $categories;
    }
}