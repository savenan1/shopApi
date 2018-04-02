<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>
        <p>
            <button class="btn btn-lg btn-success" id="test">测试API</button>
        </p>
    </div>
    <div class="jumbotron">
        <form action="/products/add-product" enctype="multipart/form-data" method="post">
            <input type="file" name="file1">
            <input type="file" name="file2">
            <input type="file" name="file3">
            <input type="file" name="file4">
            <input type="text" name="FstrProductName" id="">
            <input type="submit" value="上传">
        </form>
    </div>
<!--    <div class="jumbotron">-->
<!--        <form action="/index.php?r=products/test-qiniu" enctype="multipart/form-data" method="post">-->
<!--            <input type="file" name="test">-->
<!--            <input type="submit" value="测试七牛">-->
<!--        </form>-->
<!--    </div>-->


</div>
<?php
$this->registerJsFile("http://cdn.bootcss.com/blueimp-md5/1.1.0/js/md5.min.js");
$this->registerJsFile("/js/testAPI.js");
?>
