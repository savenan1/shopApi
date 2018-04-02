<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2017/7/3
 * Time: 17:19
 */
use yii\helpers\Html;
?>
<p>You have entered the following information:</p>
<ul>
    <li><label>Name</label>: <?= Html::encode($model->name) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->email) ?></li>
</ul>