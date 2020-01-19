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
use app\lib\exception\SuccessMessage;
use app\api\service\Token as TokenService;
use app\api\model\ActivityType as ActivityTypeModel;
class Category {
    public function getAllCategories()
    {
        $scope = TokenService::getCurrentTokenVar('scope');
        $categories = ActivityTypeModel::get(['scope'=>$scope],'items');
//        if($categories->isEmpty()){
//            throw new CategoryException();
//        }
        return $categories;
    }
    public function getCategoryByAccId($categoryId){
        $category = CategoryModel::get($categoryId);
        return $category;
    }
    public function getCategoryByActivityTypeId($activityTypeId){
       $category = CategoryModel::all(['activity_type_id'=>$activityTypeId]);
       return $category;
    }
    public function createCategory(){
        $parmas = input('post.');
        $category = new CategoryModel();
        $category->data($parmas);
        $category -> save();
        return json(new SuccessMessage(),201);
    }
    public function removeCategory($id){
        CategoryModel::destroy($id);
        return json(new SuccessMessage(),201);
    }
}