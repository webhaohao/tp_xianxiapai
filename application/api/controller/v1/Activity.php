<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2020/1/1
 * Time: 12:52
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\model\User as UserModel;
use app\api\service\Token as TokenService;
use app\api\service\Upload;
use app\api\validate\ActivityNew;
use app\lib\exception\SuccessMessage;
use app\lib\exception\UserException;
use think\Cache;
use think\Controller;

class Activity extends BaseController {
    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => 'createOrUpdateActivity']
    ];
    public function createOrUpdateActivity(){
        $validate = new ActivityNew();
        $validate -> goCheck();
        // 根据Token获取uid
        // 根据 uid 来查找用户数据，判断用户是否存在，如果不存在抛出异常
        // 获取用户从客户端提交来的地址信息
        // 根据用户发布的活动，是增加还是更新
        $uid = TokenService::getCurrentUid();
        $user = UserModel::get($uid);
        if(!$user){
            throw new UserException();
        }
        $dataArray = $validate -> getDataByRule(input('post.'));
        $activity = $user -> activity;
        if(!$activity){
            $user -> activity() -> save($dataArray);
        }
        else{
            $user -> activity ->save($dataArray);
        }
        return json(new SuccessMessage(),201);
    }

    public function wxUploadImage(){
        $serverName = (new Upload())->image();
        return [
             'url' => config('setting.img_prefix').$serverName
        ];
    }
}