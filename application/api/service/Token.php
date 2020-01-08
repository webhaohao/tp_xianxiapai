<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2019/12/27
 * Time: 21:59
 */

namespace app\api\service;


use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenException;
use app\lib\exception\TokenException;
use think\Cache;
use think\Exception;
use think\Request;

class Token {
        public  static  function generateToken(){
                // 32个字符 组成一组随机字符串
                $randChars = getRandChar(32);
                // 用 三组 字符串,进行md5加密
                $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
                // salt 盐
                $salt = config('secure.token_salt');
                return md5($randChars.$timestamp.$salt);
        }
        public static  function getCurrentTokenVar($key){
                $token = Request::instance()
                         ->header('token');
                $vars = Cache::get($token);
                if(!$vars){
                    throw new TokenException();
                }
                else{
                    if(!is_array($vars)){
                        $vars =json_decode($vars,true);
                    }
                    if(array_key_exists($key,$vars)){
                        return $vars[$key];
                    }
                    else{
                        throw new Exception('尝试获取的Token变量不存在');
                    }
                }
        }
        public static  function getCurrentUid(){
                // token
                $uid = self::getCurrentTokenVar('uid');
                return $uid;
        }
        // 用户和cms管理员都能访问的权限
        public static function needPrimaryScope(){
            $scope = self::getCurrentTokenVar('scope');
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
        // 只有用户才能访问的接口权限
        public static function needExclusiveScope(){
            $scope = self::getCurrentTokenVar('scope');
            if($scope){
                if($scope == ScopeEnum::User){
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

        public static function verifyToken($token)
        {
            $exist = Cache::get($token);
            if($exist){
                return true;
            }
            else{
                return false;
            }
        }
}