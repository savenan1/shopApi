<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $FuiId
 * @property string $FstrUserName
 * @property string $FstrEmail
 * @property integer $FuiType
 * @property integer $FuiCreateTime
 * @property string $FstrAccountName
 * @property string $FstrIdentityCard
 * @property integer $FuiCreditLevel
 * @property string $FstrUserNickname
 * @property string $FstrUserIcon
 * @property string $FstrUserSignature
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FuiType', 'FuiCreateTime', 'FuiCreditLevel'], 'integer'],
            [['FstrUserName', 'FstrAccountName', 'FstrIdentityCard', 'FstrUserNickname'], 'string', 'max' => 32],
            [['FstrEmail', 'FstrUserIcon', 'FstrUserSignature'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'FuiId' => 'Fui ID',
            'FstrUserName' => 'Fstr User Name',
            'FstrEmail' => 'Fstr Email',
            'FuiType' => 'Fui Type',
            'FuiCreateTime' => 'Fui Create Time',
            'FstrAccountName' => 'Fstr Account Name',
            'FstrIdentityCard' => 'Fstr Identity Card',
            'FuiCreditLevel' => 'Fui Credit Level',
            'FstrUserNickname' => 'Fstr User Nickname',
            'FstrUserIcon' => 'Fstr User Icon',
            'FstrUserSignature' => 'Fstr User Signature',
        ];
    }
}