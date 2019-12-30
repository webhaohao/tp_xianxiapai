<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2019/12/28
 * Time: 20:41
 */

namespace app\api\controller\v1;


use app\api\service\Token as TokenService;
use app\api\service\Token;
use app\api\validate\AddressNew;
use app\api\model\User as UserModel;
use app\lib\exception\ForbiddenException;
use app\lib\exception\SuccessMessage;
use app\lib\exception\TokenException;
use app\lib\exception\UserException;
use app\lib\enum\ScopeEnum;
use think\Cache;
use think\Controller;

class Address extends Controller{
//        protected $beforeActionList =[
//                'first' => ['only' => 'second']
//        ];
//        public function first(){
//                echo 'first';
//        }
//        // api接口
//        public function second(){
//                echo 'second';
//        }
        protected $beforeActionList = [
            'checkPrimaryScope' => ['only' => 'createOrUpdateAddress']
        ];
        protected function checkPrimaryScope(){
            $scope = Token::getCurrentTokenVar('scope');
            if($scope){
                if($scope>= ScopeEnum::User){
                    return true;
                }
                else{
                    throw new ForbiddenException();
                }
            }
            else{
                throw new TokenException();
            }

        }
        public function createOrUpdateAddress(){
            $validate = new AddressNew();
            $validate -> goCheck();
            // 根据Token获取uid
            // 根据 uid 来查找用户数据，判断用户是否存在，如果不存在抛出异常
            // 获取用户从客户端提交来的地址信息
            // 根据用户地址信息是否存在，从而判断是添加地址还是更新地址
            $uid = TokenService::getCurrentUid();
            $user = UserModel::get($uid);
            if(!$user){
                throw new UserException();
            }
            $dataArray = $validate -> getDataByRule(input('post.'));
            $userAddress = $user -> address;
            if(!$userAddress){
                $user -> address() -> save($dataArray);
            }
            else{
                $user -> address ->save($dataArray);
            }
            return json(new SuccessMessage(),201);
        }
}