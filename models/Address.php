<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property integer $FuiId
 * @property integer $FuiUserId
 * @property string $FstrAddress
 * @property string $FstrProvince
 * @property string $FstrCity
 * @property string $FstrTown
 * @property integer $FuiTag
 * @property integer $FuiStatus
 * @property string $FstrMobile
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FuiUserId'], 'required'],
            [['FuiUserId', 'FuiTag', 'FuiStatus'], 'integer'],
            [['FstrAddress'], 'string', 'max' => 128],
            [['FstrProvince', 'FstrCity', 'FstrTown'], 'string', 'max' => 32],
            [['FstrMobile'], 'string', 'max' => 64],
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
            'FstrAddress' => 'Fstr Address',
            'FstrProvince' => 'Fstr Province',
            'FstrCity' => 'Fstr City',
            'FstrTown' => 'Fstr Town',
            'FuiTag' => 'Fui Tag',
            'FuiStatus' => 'Fui Status',
            'FstrMobile' => 'Fstr Mobile',
        ];
    }
}