<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_collection".
 *
 * @property integer $FuiId
 * @property integer $FuiUserId
 * @property integer $FuiProductId
 * @property integer $FuiCreateTime
 */
class ProductCollection extends Demo
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_collection';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FuiUserId', 'FuiProductId', 'FuiCreateTime'], 'integer'],
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
            'FuiProductId' => 'Fui Product ID',
            'FuiCreateTime' => 'Fui Create Time',
        ];
    }
}