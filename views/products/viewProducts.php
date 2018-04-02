<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2017/9/4
 * Time: 22:26
 */
$this->title='Products';
?>
<table class="table">
    <thead>
    <tr>
        <th>产品名称</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?foreach ($product as $v){?>
        <tr>
            <td><?=$v['FstrProductName']?></td>
            <td><button class="btn-success">查看</button></td>
        </tr>
    <?}?>
    </tbody>
</table>

