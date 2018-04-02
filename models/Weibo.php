<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "weibo".
 *
 * @property integer $FuiId
 * @property integer $FuiUserId
 * @property string $FstrConetent
 * @property string $FstrPhotoUrl
 * @property integer $FuiForwardNum
 * @property integer $FuiPraiseNum
 * @property integer $FuiCreateTime
 */
class Weibo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'weibo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FuiUserId', 'FuiForwardNum', 'FuiPraiseNum', 'FuiCreateTime'], 'integer'],
            [['FstrConetent'], 'string', 'max' => 128],
            [['FstrPhotoUrl'], 'string', 'max' => 512],
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
            'FstrConetent' => 'Fstr Conetent',
            'FstrPhotoUrl' => 'Fstr Photo Url',
            'FuiForwardNum' => 'Fui Forward Num',
            'FuiPraiseNum' => 'Fui Praise Num',
            'FuiCreateTime' => 'Fui Create Time',
        ];
    }
}