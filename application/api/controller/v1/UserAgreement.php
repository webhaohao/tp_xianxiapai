<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2020/1/19
 * Time: 22:43
 */

namespace app\api\controller\v1;

use app\api\model\UserAgreement as UserAgreementModel;
use app\lib\exception\SuccessMessage;
class UserAgreement {
    public function createOrUpdateUserAgreement(){
        $dataArray = input('post.');
        if(empty($dataArray['id'])){
            $UserAgreement = new UserAgreementModel();
            $UserAgreement ->allowField(true)->save($dataArray);
        }
        else{
            $UserAgreement = UserAgreementModel::get($dataArray['id']);
            $UserAgreement->allowField(true)->save($dataArray);
        }
        return json(new SuccessMessage(),201);
    }
    public function getUserAgreement(){
        $UserAgreement = UserAgreementModel::get();
        if(empty($UserAgreement)){
            return new \stdClass();
        }
        return $UserAgreement;
    }
}