<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recommend".
 *
 * @property integer $FuiId
 * @property string $FstrRecommendName
 * @property string $FstrPhotoUrl
 * @property integer $FuiBrowseNum
 * @property integer $FuiPraiseNum
 * @property integer $FuiCreateTime
 */
class Recommend extends Demo
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recommend';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FuiBrowseNum', 'FuiPraiseNum', 'FuiCreateTime'], 'integer'],
            [['FstrRecommendName'], 'string', 'max' => 32],
            [['FstrPhotoUrl'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'FuiId' => 'Fui ID',
            'FstrRecommendName' => 'Fstr Recommend Name',
            'FstrPhotoUrl' => 'Fstr Photo Url',
            'FuiBrowseNum' => 'Fui Browse Num',
            'FuiPraiseNum' => 'Fui Praise Num',
            'FuiCreateTime' => 'Fui Create Time',
        ];
    }
}