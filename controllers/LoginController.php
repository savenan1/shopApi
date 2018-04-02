<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2018/2/1
 * Time: 22:00
 */

namespace app\controllers;


use app\config\AppConfig;
use app\models\User;
use app\models\UserPass;
use app\utils\Util;
use common\services\RedisService;
use common\services\TokenService;
use yii\base\Exception;

class LoginController extends BaseController
{
    const ttl = 2592000;//30天

    /**
     * 用户注册
     */
    public function actionCreateUser()
    {
        $params = $this->postData;
        $userName = $params['userName'];
        $passWord = $params['passWord'];

        $oldUser = User::find()->select('*')
            ->where(['FstrUserName' => $userName])->asArray()->one();
        if (!empty($oldUser)) {
            return $this->renderJSON(-1002, 'exist user');
        }
        $transaction = User::getDb()->beginTransaction();
        try {
            $user = new User();
            $user->FstrUserName = $userName;
            if (!$user->save()) {
                throw new Exception('some error');
            }
            $userPass = new UserPass();
            $userPass->FuiUserId = $user->FuiId;
            $userPass->FstrUserPassWord = $passWord;
            if (!$userPass->save()) {
                throw new Exception('some error');
            }
            $transaction->commit();
            return $this->renderJSON(0, 'success');
        } catch (Exception $e) {
            $transaction->rollBack();
            return $this->renderJSON(-1003, $e->getMessage());
        }
    }

    /**
     * 用户登录
     */
    public function actionLogin()
    {
        $params = $this->postData;
        //校验参数
        if (empty($params['userName']) || empty($params['password'])) {
            return $this->response(-1003, 'invalid params');
        }

        $user = User::findOne(['FstrUserName' => $params['userName']]);
        if (empty($user)) {
            return $this->response(-1002, '用户不存在');
        }
        $userPass = UserPass::findOne(['FuiUserId' => $user->FuiId]);
        if (!($params['password'] == $userPass->FstrUserPassWord)) {
            Util::renderJSON(-1001, '密码错误');
        }

        //重新登录时清除原来token
        $token = RedisService::hGet(AppConfig::uid2token, $user->FuiId);
        if(isset($token)){
            RedisService::hDel(AppConfig::userSession, $token);
        }

        //创建token
        $token = TokenService::Uniqid();
        $ttl = time() + self::ttl;
        $session = [
            'uid' => $user->FuiId,
            'ttl' => $ttl
        ];

        $session = json_encode($session);
        //将登录态存入redis
        RedisService::hSet(AppConfig::userSession, $token, $session);

        //存入uid token映射
        RedisService::hSet(AppConfig::uid2token, $user->FuiId, $token);

        return $this->response(0, '登录成功', [
            'user' => $user,
            'token' => $token
        ]);
    }
}