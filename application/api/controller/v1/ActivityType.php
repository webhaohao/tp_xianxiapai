<?php
/**
 * Created by PhpStorm.
 * User: web_haohao
 * Date: 2020/1/16
 * Time: 13:46
 */

namespace app\api\controller\v1;

use app\api\model\ActivityType as ActivityTypeModel;

class ActivityType {
        public function getAllActivityType(){
             return ActivityTypeModel::all([]);
        }
        public function getAllActivityTypeCategories(){
            return ActivityTypeModel::all([],'items');
        }
        public function getActivitiyTypeByAdmin(){
             return ActivityTypeModel::where('scope','>',16)->select();
        }
}