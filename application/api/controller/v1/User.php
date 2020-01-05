<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2020/1/5
 * Time: 13:13
 */

namespace app\api\controller\v1;
use app\api\service\Token as TokenService;
use app\api\validate\UserUpdate;
use app\api\model\User as UserModel;
use app\lib\exception\SuccessMessage;

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
            $user -> save($dataArray);
            return json(new SuccessMessage(),201);
        }
}