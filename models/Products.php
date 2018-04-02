<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $FuiId
 * @property string $FstrProductName
 * @property string $FstrDetails
 * @property string $FstrDescription
 * @property integer $FuiBuyPrice
 * @property integer $FuiRentPrice
 * @property integer $FuiOptionsId
 * @property integer $FuiUserId
 * @property integer $FuiProductStatus
 * @property integer $FuiNum
 * @property integer $FuiCreateTime
 * @property string $FuiIdentifiedTag
 * @property string $FstrVideoUrl
 * @property string $FstrPhotoUrl
 * @property integer $FuiCanRent
 * @property integer $FuiAtLeastDays
 * @property integer $FuiBrandId
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FuiBuyPrice', 'FuiRentPrice', 'FuiOptionsId', 'FuiUserId', 'FuiProductStatus', 'FuiNum', 'FuiCreateTime', 'FuiCanRent', 'FuiAtLeastDays', 'FuiBrandId'], 'integer'],
            [['FstrProductName', 'FstrDetails'], 'string', 'max' => 64],
            [['FstrDescription', 'FstrVideoUrl'], 'string', 'max' => 512],
            [['FuiIdentifiedTag'], 'string', 'max' => 32],
            [['FstrPhotoUrl'], 'string', 'max' => 1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'FuiId' => 'Fui ID',
            'FstrProductName' => 'Fstr Product Name',
            'FstrDetails' => 'Fstr Details',
            'FstrDescription' => 'Fstr Description',
            'FuiBuyPrice' => 'Fui Buy Price',
            'FuiRentPrice' => 'Fui Rent Price',
            'FuiOptionsId' => 'Fui Options ID',
            'FuiUserId' => 'Fui User ID',
            'FuiProductStatus' => 'Fui Product Status',
            'FuiNum' => 'Fui Num',
            'FuiCreateTime' => 'Fui Create Time',
            'FuiIdentifiedTag' => 'Fui Identified Tag',
            'FstrVideoUrl' => 'Fstr Video Url',
            'FstrPhotoUrl' => 'Fstr Photo Url',
            'FuiCanRent' => 'Fui Can Rent',
            'FuiAtLeastDays' => 'Fui At Least Days',
            'FuiBrandId' => 'Fui Brand ID',
        ];
    }
}