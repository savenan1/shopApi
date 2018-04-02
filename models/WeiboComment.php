<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "weibo_comment".
 *
 * @property integer $FuiId
 * @property integer $FuiUserId
 * @property integer $FuiWeiboId
 * @property string $FstrConetent
 * @property integer $FuiSequenceNo
 * @property integer $FuiCreateTime
 */
class WeiboComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'weibo_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FuiUserId', 'FuiWeiboId', 'FuiSequenceNo', 'FuiCreateTime'], 'integer'],
            [['FstrConetent'], 'string', 'max' => 128],
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
            'FuiWeiboId' => 'Fui Weibo ID',
            'FstrConetent' => 'Fstr Conetent',
            'FuiSequenceNo' => 'Fui Sequence No',
            'FuiCreateTime' => 'Fui Create Time',
        ];
    }
}