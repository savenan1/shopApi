<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2018/4/22
 * Time: 11:15
 */

namespace app\models;


use yii\db\ActiveRecord;

class Demo extends ActiveRecord
{
    /**
     * 获取db连接
     * @return \yii\db\Connection
     */
    public static function getDb(){
        return \Yii::$app->db;
    }

    /**
     * 获取json序列化的error信息
     * @return string
     */
    public function getErrorMsg(){
        $error = $this->getErrors();
        return json_encode($error);
    }

}