<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2020/1/1
 * Time: 14:31
 */

namespace app\api\controller;


use think\Controller;
use app\api\service\Token as TokenService;

class BaseController extends Controller{
    protected function checkPrimaryScope(){

        TokenService::needPrimaryScope();

    }
    protected function checkExclusiveScope(){

        TokenService::needExclusiveScope();

    }
}