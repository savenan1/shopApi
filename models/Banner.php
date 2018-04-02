<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banner".
 *
 * @property integer $FuiId
 * @property integer $FuiProductId
 * @property integer $FuiCategoryId
 * @property string $FstrPhotoUrl
 * @property integer $FuiUserId
 * @property integer $FuiCreateTime
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FuiProductId', 'FuiCategoryId', 'FuiUserId', 'FuiCreateTime'], 'integer'],
            [['FstrPhotoUrl'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'FuiId' => 'Fui ID',
            'FuiProductId' => 'Fui Product ID',
            'FuiCategoryId' => 'Fui Category ID',
            'FstrPhotoUrl' => 'Fstr Photo Url',
            'FuiUserId' => 'Fui User ID',
            'FuiCreateTime' => 'Fui Create Time',
        ];
    }
}
