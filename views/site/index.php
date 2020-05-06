<?php

/* @var $this yii\web\View */

$this->title = 'برنامج المساعدات الأسرية';
?>
<div class="site-index">
    <center>
        <h1>برنامج المساعدات الأسرية</h1>
    </center>
    <div class="col-md-6">
        <div class="jumbotron">
            <h1>لمراجعة الطلب</h1>
            <p><?= \yii\bootstrap\Html::a('إضغط هنا', ['site/status'], ['class' => 'btn btn-lg btn-success']) ?></p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="jumbotron">
            <h1>لتقديم طلب جديد</h1>
            <p><?= \yii\bootstrap\Html::a('إضغط هنا', ['site/new'], ['class' => 'btn btn-lg btn-success']) ?></p>
        </div>

    </div>

</div>
