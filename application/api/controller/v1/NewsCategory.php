<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2020/1/10
 * Time: 10:19
 */

namespace app\api\controller\v1;

use app\api\model\NewsCategory as NewsCategoryModel;
use app\lib\exception\SuccessMessage;

class NewsCategory {
    public function getAllNewsCategories()
    {
        $categories = NewsCategoryModel::all([],'img');
        if($categories->isEmpty()){
            throw new CategoryException();
        }
        return $categories;
    }
    public function removeNewsCategory($id){
        NewsCategoryModel::destroy($id);
        return json(new SuccessMessage(),201);
    }
    public function createNewsCategory(){
        $newCategoryModel = new NewsCategoryModel();
        $params = input('post.');
        $newCategoryModel -> name = $params['name'];
        $newCategoryModel ->save();
        return json(new SuccessMessage(),201);
    }
}