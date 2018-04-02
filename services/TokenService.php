<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2017/9/15
 * Time: 16:45
 */

namespace common\services;


class TokenService
{
    /**
     * token秘钥
     */
    const secretKey = '*3)6!2&';

    public static function createToken($params)
    {
        $time = intval(time() / 10000);
        $str = $params . $time . self::secretKey;
        return md5($str);
    }


    /**
     * 生成不重复唯一ID
     */
    public static function Uniqid()
    {
        return md5(uniqid(md5(microtime(true)), true));
    }
}