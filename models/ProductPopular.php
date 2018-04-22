<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_popular".
 *
 * @property integer $FuiId
 * @property integer $FuiProductId
 * @property integer $FuiStatus
 * @property integer $FuiSequence
 * @property integer $FuiCreateTime
 */
class ProductPopular extends Demo
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_popular';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FuiProductId', 'FuiStatus', 'FuiSequence', 'FuiCreateTime'], 'integer'],
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
            'FuiStatus' => 'Fui Status',
            'FuiSequence' => 'Fui Sequence',
            'FuiCreateTime' => 'Fui Create Time',
        ];
    }
}