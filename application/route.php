<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;
// Route::rule('路由表达式','路由地址','请求类型','路由参数(数组)','变量规则(数组)')
Route::get('api/:version/banner/:id','api/:version.Banner/getBanner');

Route::get('api/:version/theme','api/:version.Theme/getSimpleList');

Route::get('api/:version/theme/:id','api/:version.Theme/getComplexOne');

Route::get('api/:version/product/recent','api/:version.Product/getRecent');

Route::get('api/:version/product/by_category','api/:version.Product/getAllInCategory');

Route::get('api/:version/product/:id','api/:version.Product/getOne',[],['id'=>'\d+']);

//Route::group('api/:version/product',function(){
//      Route::get('/by_category','api/:version.Product/getAllInCategory');
//      Route::get('/:id','api/:version.Product/getOne',[],['id'=>'\d+']);
//      Route::get('/recent','api/:version.Product/getRecent');
//});

Route::get('api/:version/category/all','api/:version.Category/getAllCategories');

Route::get('api/:version/category/by_accid','api/:version.Category/getCategoryByAccId');



// Token
Route::post('api/:version/token/user','api/:version.Token/getToken');

Route::post('api/:version/token/verify','api/:version.Token/verifyToken');

Route::post('api/:version/token/app','api/:version.Token/getAppToken');


// User

Route::get('api/:version/user/check_user/:activityId','api/:version.User/checkUserIsJoinActivity');

Route::post('api/:version/address','api/:version.Address/createOrUpdateAddress');

Route::get('api/:version/second','api/:version.Address/second');


// add activity

Route::post('api/:version/create_activity','api/:version.Activity/createOrUpdateActivity');

Route::get('api/:version/activity/by_scope/:scope','api/:version.Activity/getActivityByScope');

Route::post('api/:version/activity/join_activity','api/:version.Activity/userJoinActivity');

// get Join poopleInfo by Activity

Route::get('api/:version/activity/detail/:id','api/:version.Activity/getActivityDetailById');


//order
Route::post('api/:version/order','api/:version.Order/placeOrder');





//upload image

Route::post('api/:version/activity/upload_image','api/:version.Activity/wxUploadImage');



// user

Route::post('api/:version/user/update_wx_userinfo','api/:version.User/UpdateWxUserInfo');