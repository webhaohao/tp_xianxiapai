<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2020/1/5
 * Time: 13:13
 */

namespace app\api\controller\v1;
use app\api\model\Activity;
use app\api\service\Token as TokenService;
use app\api\validate\UserUpdate;
use app\api\model\User as UserModel;
use app\lib\exception\SuccessMessage;
use app\api\model\UserActivity as UserActivityModel;
use app\api\model\Activity as ActivityModel;
use think\Request;

class User {
        protected $beforeActionList = [
            'checkPrimaryScope' => ['only' => 'UpdateWxUserInfo']
        ];
        public  function UpdateWxUserInfo(){
            $validate = new UserUpdate();
            $uid = TokenService::getCurrentUid();
            $user = UserModel::get($uid);
            if(!$user){
                throw new UserException();
            }
            $dataArray = $validate -> getDataByRule(input('post.'));
            // 如果微信用户没有头像 设置默认头像
            if(empty($dataArray['avatar'])){
                //获取当前域名
                $domain = Request::instance()->domain();
                $dataArray['avatar']=$domain.'/images/user_default.png';
            }
            $user -> save($dataArray);
            return json(new SuccessMessage(),201);
        }
        public function checkUserIsJoinActivity($activityId){
            $uid = TokenService::getCurrentUid();
            $isExist = UserActivityModel::check($uid,$activityId);
            if(empty($isExist)){
                return ['isExist' => 0];
            }
            return ['isExist' => 1];
        }
        public function getUserReleasedActivity(){
           $uid = TokenService::getCurrentUid();
           return ActivityModel::all(['release_id'=>$uid]);
        }
        public function getUserJoinActivity(){
            $uid = TokenService::getCurrentUid();
            $activityIds = UserActivityModel::getUserJoinActivityIds($uid);
            return Activity::all($activityIds,['users','items','items.img']);
        }
        public function getWxUserInfo(){
            $uid = TokenService::getCurrentUid();
            return UserModel::get($uid);
        }
}