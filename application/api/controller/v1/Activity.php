<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2020/1/1
 * Time: 12:52
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\model\Activity as ActivityModel;
use app\api\model\ActivityImage as ActivityImageModel;
use app\api\model\Category as CategoryModel;
use app\api\model\Image as ImageModel;
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
        $scope = TokenService::getCurrentTokenVar('scope');
        $user = UserModel::get($uid);
        if(!$user){
            throw new UserException();
        }
        $dataArray = $validate -> getDataByRule(input('post.'));
        $detailImgs = input('post.detail_imgs/a');
        $dataArray['scope'] = $scope;
        $dataArray['user_id'] = $uid;
        // 活动积分暂时默认10
        $dataArray['join_people'] = 1;
        $dataArray['integral'] = 10;
        $activityModel = new ActivityModel();
        $activityModel ->data($dataArray,true);
        $activityModel ->save($dataArray);
        $activityId = $activityModel->id;
        if($detailImgs){
            foreach ($detailImgs as &$p) {
                  $p['from'] = 1;
                  $arr = explode('/', $p['url']);
                  $count = count($arr);
                  $p['url'] = '/'.$arr[$count-2].'/'.$arr[$count-1];
            }
            $imgModel = new ImageModel();
            $imgs = $imgModel ->saveAll($detailImgs);
            $imgIds = [];
            for($i=0;$i<count($imgs);$i++){
                $imgIds[$i]['img_id'] = $imgs[$i]->getAttr('id');
                $imgIds[$i]['activity_id'] = $activityId;
            }
            $activityImageModel = new ActivityImageModel();
            $activityImageModel -> saveAll($imgIds);
        }

        return json(new SuccessMessage(),201);
    }
    // 根据客户端传入是个人活动还是组织活动....
    public  function getActivityByScope($scope){
        //(new IDMustBePostiveInt()) -> goCheck();
        $activity = ActivityModel::getActivityByScope($scope);
        return $activity;
    }
    public function wxUploadImage(){
        $serverName = (new Upload())->image();
        return [
             'url' => config('setting.img_prefix').$serverName
        ];
    }

    public function getReleaserInfoByScopeAndUserId(){
        $data = input('post.');
        if($data['scope']==16){
           return UserModel::get($data['user_id']);
        }
    }
}