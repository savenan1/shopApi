<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2018/1/23
 * Time: 20:11
 */

namespace app\config;


class AppConfig
{
    /**
     * 用户session
     */
    const userSession = 'USER_SESSION';

    const uid2token = 'UID_TO_TOKEN';

    const accessId = '66q';
    const accessKey = 'mdhfuer641nbstsrbv';

    /**
     * 手机验证码重新发送时间
     */
    const mobileTTL = 'MOBILE_TTL';

    /**
     * 验证码过期时间
     */
    const authCodeTTL = 'AUTH_CODE_TTL';
}