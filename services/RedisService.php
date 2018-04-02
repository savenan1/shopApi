<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2017/9/12
 * Time: 14:41
 */

namespace common\services;


use app\config\AppConfig;

class RedisService
{
    public function __construct()
    {

    }

    public static function getRedis()
    {
        if(!\Yii::$app->has("redis")){
            $config = require_once(__DIR__.'/../config/redis.php');
            \Yii::$app->set("redis",$config);
        }
        return \Yii::$app->redis;
    }

    public static function hSet($group, $key, $value, $expire = 0)
    {
        $redis = self::getRedis();
        $redis->hset($group, $key, $value);
        if ($expire) {
            $redis->expire($group, $expire);
        }
    }

    public static function hGet($group, $key)
    {
        $redis = self::getRedis();
        return $redis->hget($group, $key);
    }

    public static function hDel($group, $key){
        $redis = self::getRedis();
        $redis->hdel($group, $key);
    }

    public static function hGetAll($group){
        $redis = self::getRedis();
        return $redis->hgetall($group);
    }

    public static function getTokenByUid($uid){
        return self::hGet(AppConfig::uid2token, $uid);
    }

    public static function getUidByToken($token){
        $user = self::hGet(AppConfig::userSession, $token);
        $uid = json_decode($user, true)['uid'];
        return $uid;
    }
}