<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2017/8/8
 * Time: 11:56
 */

namespace app\controllers;


use app\config\AppConfig;
use app\filters\DataFilter;
use app\filters\UserFilter;
use app\models\User;
use app\models\UserPass;
use app\utils\Util;
use common\services\MessageService;
use common\services\QiniuService;
use common\services\RedisService;
use common\services\TokenService;
use common\services\UserService;
use yii\db\Exception;
use yii\di\Container;

class UserController extends BaseController
{
    //public $enableCsrfValidation = false;

    /** @var UserService $userService  */
    private $userService = null;

    public function behaviors()
    {
        return [
            [
                'class' => DataFilter::className(),
            ],
            [
                'class' => UserFilter::className(),
            ]
        ];
    }

    public function init()
    {
        $container = new Container();
        $this->userService = $container->get(UserService::class);
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function actionLogout(){
        $token = $this->token;
        $this->userService->logout($token);

        return $this->renderJSON(0, 'ok');
    }


    /**
     * 修改用户信息
     */
    public function actionModifyUserInfo()
    {
        $params = $this->postData;
        if ($params['token'] != TokenService::createToken($params['FuiId'])) {
            return $this->renderJSON(-1003, 'permission denied');
        }
        $user = User::findOne(['FuiId' => $params['FuiId']]);
        if (empty($user)) {
            return $this->renderJSON(-1001, 'denied');
        }
        $user->FstrAccountName = $params['FstrAccountName'];
        $user->FstrUserSignature = $params['FstrUserSignature'];
        if (!$user->save()) {
            return $this->renderJSON(-1002, 'error');
        }
        return $this->renderJSON(0, 'success', $user);
    }

    /**
     * 修改用户头像
     */
    public function actionModifyUserIcon()
    {
        $params = $this->postData;
        $pic = $_FILES['icon'];
        if ($params['token'] != TokenService::createToken($params['FuiId'])) {
            return $this->renderJSON(-1003, 'permission denied');
        }
        $user = User::findOne(['FuiId' => $params['FuiId']]);
        $service = $service = new QiniuService();
        $fileName = time() . $pic['name'];
        $result = $service->upload($fileName, $pic['tmp_name']);
        if (!$result['ret'] == 0) {
            return $this->renderJSON(-1001, 'pic error');
        }
        $user->FstrUserIcon = $result['data']['url'];
        if (!$user->save()) {
            return $this->renderJSON(-1002, 'error');
        }
        return $this->renderJSON(0, 'success', $result['data']['url']);
    }

    /**
     * 发送验证码
     */
    public function actionSendVerifyMsg()
    {
        $params = \Yii::$app->request->postData;
        if ($params['token'] != TokenService::createToken($params['mobile'])) {
            return $this->renderJSON(-1001, 'illegality params');
        }
        $mobile = $params['mobile'];
        $authTime = $mobile . '1';
        $user = User::find()->select('FuiId')
            ->where(['FstrUserName' => $mobile])->asArray()->one();
        if (!empty($user)) {
            return $this->renderJSON(-1002, 'exist user');
        }
        $TTL = RedisService::hGet($authTime, AppConfig::mobileTTL);
        if (!$TTL) {
            RedisService::hSet($authTime, AppConfig::mobileTTL, 1, 60);
            $msgService = new MessageService();
            $ret = $msgService->sendVerifyCode(3099005, $mobile);
            if ($ret['code'] == 200) {
                RedisService::hSet($mobile, AppConfig::authCodeTTL, $ret['obj'], 600);
                return $this->renderJSON(0, 'success');
            } else {
                return $this->renderJSON($ret['code'], $ret['msg']);
            }
        }
        return $this->renderJSON(-1003, '请勿重复发送');
    }

    public function actionTestTime()
    {
        return TokenService::createToken('13510630197');
    }

}