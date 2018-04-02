<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "weibo_relationship".
 *
 * @property integer $FuiId
 * @property integer $FuiUserId
 * @property integer $FuiFocusId
 * @property integer $FuiCreateTime
 */
class WeiboRelationship extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'weibo_relationship';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FuiUserId', 'FuiFocusId', 'FuiCreateTime'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'FuiId' => 'Fui ID',
            'FuiUserId' => 'Fui User ID',
            'FuiFocusId' => 'Fui Focus ID',
            'FuiCreateTime' => 'Fui Create Time',
        ];
    }
}