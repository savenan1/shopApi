<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2018/3/28
 * Time: 22:52
 */

namespace common\services;


use app\config\AppConfig;

class UserService
{
    public function login(){

    }

    public function logout($token){
        $session = RedisService::hGet(AppConfig::userSession, $token);
        $session = json_decode($session);

        $uid = $session['uid'];

        RedisService::hDel(AppConfig::userSession, $token);
        RedisService::hDel(AppConfig::uid2token, $uid);
    }
}