<?php
namespace app\utils;

/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2018/1/23
 * Time: 19:54
 */
class Util
{
    /**
     * 将json 数据输出到前端
     * @param $ret
     * @param string $message
     * @param null $data
     */
    public static function renderJSON($ret, $message = '', $data = null) {
        $result = array(
            'ret' => $ret,
            'msg' => $message,
        );
        if ($data !== null) {
            $result['data'] = $data;
        }
        $json = json_encode($result, JSON_UNESCAPED_UNICODE);

        echo $json;

        \Yii::$app->end();
    }
}