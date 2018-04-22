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
            'FuiId' => '自增主键',
            'FstrProductName' => '商品名称',
            'FstrDetails' => '商品详情',
            'FstrDescription' => '商品描述',
            'FuiBuyPrice' => '出售价格(分)',
            'FuiRentPrice' => '出租价格(分)',
            'FuiOptionsId' => 'Fui Options ID',
            'FuiUserId' => '卖家id',
            'FuiProductStatus' => '商品状态 0 待审核 1 审核通过 2 审核不通过 3 交易中 4 已下架',
            'FuiNum' => '商品总数',
            'FuiCreateTime' => '创建时间',
            'FuiIdentifiedTag' => '唯一标识',
            'FstrVideoUrl' => '视频地址',
            'FstrPhotoUrl' => '图片地址 json',
            'FuiCanRent' => '是否能租',
            'FuiAtLeastDays' => '几天起租',
            'FuiBrandId' => '品牌主键',
        ];
    }
}