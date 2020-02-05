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
use app\api\model\Image as ImageModel;
use app\api\model\ThirdApp;
use app\api\model\User as UserModel;
use app\api\model\ActivityType as ActivityTypeModel;
use app\api\model\UserActivity;
use app\api\service\ContentCheck;
use app\api\service\Token as TokenService;
use app\api\service\Activity as ActivityService;
use app\api\service\Upload;
use app\api\validate\ActivityNew;
use app\lib\enum\ScopeEnum;
use app\lib\exception\ActivityException;
use app\lib\exception\ContentException;
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
        $dataArray = $validate -> getDataByRule(input('post.'));
        // 检测发布内容是否合法
        $contentCheck = new ContentCheck();
        $titleIsVaild = $contentCheck ->verifyMsg($dataArray['title']);
        $detailVaild  = $contentCheck ->verifyMsg($dataArray['detail']);
        $datailLocation = $contentCheck ->verifyMsg($dataArray['location']);
        if(!$titleIsVaild || !$detailVaild || !$datailLocation){
            throw new ContentException([
                'msg' => '发布内容不合法,请检查发布内容!'
            ]);
        }
        if($scope == ScopeEnum::User) {
            $user = UserModel::get($uid);
            $user ->save();
        }
        else{
            $user = ThirdApp::get($uid);
        }
        if(!$user){
            throw new UserException();
        }
        $detailImgs = input('post.detail_imgs/a');

        if(empty($dataArray['activity_type_id'])){
            $activityType = ActivityTypeModel::get(['scope'=>$scope]);
            $activityTypeId = $activityType -> id;
            $dataArray['activity_type_id'] = $activityTypeId;
        }
        $dataArray['scope'] = $scope;
        $dataArray['release_id'] = $uid;
        // 活动积分修改为活动的人数
        $dataArray['integral'] = ceil($dataArray['number']*0.15);
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
        // 如果权限的scope为用户 则在 user_activity 插入一条记录
        if($scope == ScopeEnum::User){
            $userActivity =  new UserActivity();
            $userActivity->data(
                    [
                        'user_id' => $uid,
                        'activity_id'=>$activityId
                    ]
            );
            $userActivity->save();
        }
        return json(new SuccessMessage(),201);
    }

    public  function getActivityByFilter(){
        $params = input('post.');
        $id = $params['id'];
        $page = $params['page'];
        $size = $params['size'];
        $tab_item_active = $params['tabs_item_active'];
        $categoryId = $params['categoryId'];
        $activityPages = ActivityModel::getActivitesByFilter($id,$tab_item_active,$categoryId,$page,$size);
        $data = $activityPages->hidden(['detail'])->toArray();
        return [
            'data' => $data,
            'current_page'=>$activityPages->getCurrentPage(),
            'total' =>$activityPages->total()
        ];
    }
    public function getActivityByActivityTypeId($page=1,$size=10,$id){
        $pagingData = ActivityModel::where('activity_type_id','=',$id)
            ->order('create_time desc')
            ->paginate($size,false,['page'=>$page]);
        return $pagingData;
    }
    public function wxUploadImage(){
        $serverName = (new Upload())->image();
        $contentCheck = new ContentCheck();
        $files = $_SERVER['DOCUMENT_ROOT'].'/images'.$serverName;
        $result = $contentCheck ->verifyImage($files);
        if($result){
            return [
                'url' => config('setting.img_prefix').$serverName
            ];
        }
        else{
            return [
                'url' =>''
            ];
        }

    }

    public function getActivityDetailById($id)
    {
        return ActivityModel::getDetailByActivityId($id);
    }
    public function userJoinActivity(){
        $activityId = input('post.activityId');
        $activityService = new ActivityService();
        $scope = TokenService::getCurrentTokenVar('scope');
        $uid = TokenService::getCurrentUid();
        $user = UserModel::get($uid);
        if(!$user){
            throw new UserException();
        }
        else{
            // 查看活动当前用户是否已经参加
            $isJoin = $activityService->userJoinActivity($activityId);
            // 查看活动的状态是否已经开始
            // 1 已经开始 0 未开始
            $activity = ActivityModel::get($activityId);
            $status = $activity->status;
            if($status == 1){
                throw new ActivityException([
                    'msg' =>'活动已经开始,无法报名!'
                ]);
            }
            if($isJoin){
                if($scope == ScopeEnum::User){
                    $userActivity =  new UserActivity();
                    $userActivity->data(
                        [
                            'user_id' => $uid,
                            'activity_id'=>$activityId
                        ]
                    );
                    $userActivity->save();
                    return json(new SuccessMessage(),201);
                }
            }
            else{
                throw new ActivityException();
            }
        }

    }

    public function getActivityByKeywords(){
        return ActivityModel::all([],['users','items','items.img']);
    }
    public function searchActivityByKeywords(){
        $kw = input('post.value');
        $where['title'] = ['like','%'.$kw.'%'];
        $activity = ActivityModel::where($where)->select();
        return $activity;
    }
}