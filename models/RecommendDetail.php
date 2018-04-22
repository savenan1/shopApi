<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recommend_detail".
 *
 * @property integer $FuiId
 * @property integer $FuiRecommendId
 * @property integer $FuiProductId
 * @property string $FstrArticle
 * @property string $FstrPhotoUrl
 * @property integer $FuiCreateTime
 */
class RecommendDetail extends Demo
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recommend_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FuiRecommendId', 'FuiProductId', 'FuiCreateTime'], 'integer'],
            [['FstrArticle'], 'required'],
            [['FstrArticle'], 'string'],
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
            'FuiRecommendId' => 'Fui Recommend ID',
            'FuiProductId' => 'Fui Product ID',
            'FstrArticle' => 'Fstr Article',
            'FstrPhotoUrl' => 'Fstr Photo Url',
            'FuiCreateTime' => 'Fui Create Time',
        ];
    }
}