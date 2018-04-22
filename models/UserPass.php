<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_pass".
 *
 * @property integer $FuiId
 * @property integer $FuiUserId
 * @property string $FstrUserPassWord
 */
class UserPass extends Demo
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_pass';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FuiUserId'], 'integer'],
            [['FstrUserPassWord'], 'string', 'max' => 50],
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
            'FstrUserPassWord' => 'Fstr User Pass Word',
        ];
    }
}
