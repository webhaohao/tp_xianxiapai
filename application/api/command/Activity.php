<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2020/2/1
 * Time: 22:25
 */

namespace app\api\command;


use app\api\controller\v1\User;
use app\api\model\UserActivity;
use think\console\Command;
use think\console\Input;
use think\console\Output;
use app\api\model\Activity as ActivityModel;
use app\api\model\UserActivity as UserActivityModel;
use app\api\model\User as UserModel;
class Activity extends Command {
        protected function configure(){
            $this->setName('Activity')->setDescription("以活动的开始时间为准,更新状态");
        }
        protected function execute(Input $input,Output $output){
            $output->writeln('Date Crontab job start...');
            /*** 这里写计划任务列表集 START ***/
            $this->IntegralAssignMentByActivityProcess();
            $this->ActivityUpdateStatus();
            /*** 这里写计划任务列表集 END ***/
            $output->writeln('Date Crontab job end...');
        }
        private function IntegralAssignMentByActivityProcess(){
            $activity = ActivityModel::all(function($query){
                $query->where('start_time','<',time())
                    ->where('status','=',0);
            })->toArray();
            foreach($activity as $item){
                $this->ActivityItem($item);
            }
        }
        public function ActivityItem($item){
            $count = UserActivityModel::where('activity_id','=',$item['id'])->count();
            $userActivity = UserActivityModel::all(['activity_id'=>$item['id']])->toArray();

            if(floor($count/$item['number'])>=0.5){
                $user = UserModel::get($item['release_id']);
                $integral = $user->integral;
                $_integral =ceil($count * 0.5);
                $user->integral = intval($integral)+$_integral;
                $user->save();
            }
            foreach($userActivity as $p){
                $joinUser = UserModel::get($p['user_id']);
                $joinIntegral = $joinUser->integral;
                $_joinIntegral = ceil($count * 0.15);
                $joinUser->integral = intval($joinIntegral)+$_joinIntegral;
                $joinUser->save();
            }
        }
        public function ActivityUpdateStatus(){
               $activity = new ActivityModel();
               $activity->save(['status'=>1],function($query){
                    $query->where('start_time','<',time())
                          ->where('status','=',0);
               });
        }
}