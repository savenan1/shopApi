<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products_detail".
 *
 * @property integer $FuiId
 * @property integer $FuiProductId
 * @property integer $FuiStatus
 * @property integer $FuiIsLock
 * @property integer $FuiCreateTime
 */
class ProductsDetail extends Demo
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FuiProductId', 'FuiStatus', 'FuiIsLock', 'FuiCreateTime'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'FuiId' => '自增主键, 商品唯一编号',
            'FuiProductId' => '商品表主键',
            'FuiStatus' => '商品状态 0 已上架,1 交易中,2 已出租,3 已出售,4 出租完处理中',
            'FuiIsLock' => '是否锁定 防止并发修改 1 锁定,0 锁定',
            'FuiCreateTime' => '创建时间',
        ];
    }
}