<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2020/1/10
 * Time: 10:35
 */

namespace app\api\controller\v1;

use app\api\validate\News as NewVaildate;
use app\api\service\Token as TokenService;
use app\lib\enum\ScopeEnum;
use app\api\model\News as NewsModel;
use app\lib\exception\SuccessMessage;

class News {
        public function createOrUpdateNews(){
            $validate = new NewVaildate();
            $validate -> goCheck();
            // 根据Token获取uid
            // 根据 uid 来查找用户数据，判断用户是否存在，如果不存在抛出异常
            // 获取用户从客户端提交来的地址信息
            // 根据用户发布的活动，是增加还是更新
            $scope = TokenService::getCurrentTokenVar('scope');
            // 如果是管理员才允许更新news
            if($scope == ScopeEnum::Super){
                $dataArray = $validate -> getDataByRule(input('post.'));
                $news = new NewsModel();
                $news -> save($dataArray);
                return json(new SuccessMessage(),201);
            }
        }
        public  function getNewsDetailByCategoryId($id){
            if(empty($id)){
               $news = NewsModel::all();
            }
            else{
               $news = NewsModel::all(['category_id'=>$id]);
            }
            return $news;
        }
        public  function getNewsDetailById($id){
            $detail = NewsModel::get($id);
            return $detail;
        }
}