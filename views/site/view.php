<?php
/**
 * Created by PhpStorm.
 * User: Arafeh
 * Date: 5/4/2020
 * Time: 7:19 PM
 */
$this->title = 'الطلبات';


/* @var $provider \yii\debug\models\timeline\DataProvider */
/* @var $search \app\models\forms\PaymentSearchForm */

?>


<style>
    th {
        text-align: right;
    }

    .container {
        direction: rtl;
    }

    .sr-only {
        all: initial;
    }

    .sb-button {
        height: 100%;
    }

    .form-group {
        margin: 8px;
    }

    .grid-view {
        overflow: auto;
    }

    .link {
        background: none;
        border: none;
        padding: 0;
        font: inherit;
        cursor: pointer;
        outline: inherit;
        color: #337ab7;
    }

</style>

<div style="margin: 32px">
    <h3>بحث</h3>
    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'id' => 'search-form',
        'layout' => 'inline',
        'fieldConfig' => [
            'template' => "{label}{error}\n{beginWrapper}\n{input}\n{hint}\n{endWrapper}",
        ],
    ]); ?>
    <?= $form->field($search, 'firstName')->label('الاسم') ?>
    <?= $form->field($search, 'lastName')->label('اسم العائلة') ?>
    <?= $form->field($search, 'fatherName')->label('اسم الأب') ?>
    <?= $form->field($search, 'idNumber')->label('رقم السجل') ?>
    <br>
    <div class="form-group">
        <div class="sb-button">
            <?= \yii\bootstrap\Html::submitButton('بحث', ['class' => 'btn btn-primary']) ?>
            <?= \yii\bootstrap\Html::a('إلغاء', ['site/view'], ['class' => 'btn btn-danger']) ?>
        </div>
    </div>
    <?php \yii\bootstrap\ActiveForm::end() ?>
</div>

<?= \yii\grid\GridView::widget([
    'dataProvider' => $provider,
    'columns' => [
        [
            'class' => \yii\grid\ActionColumn::className(),
            'contentOptions' => ['style' => 'white-space: nowrap;'],
            'buttons' => [
                'update' => function ($url, $model, $key) {
                    return \yii\bootstrap\Html::a(\yii\bootstrap\Html::tag('span', '', ['class' => "glyphicon glyphicon-usd"]), ['/site/payment', 'supportId' => $model->id]);
                },
                'view' => function ($url, $model, $key) {
                    return "<form method='post' style='display: inline' action='status'><input type='hidden' name='statusId' value='$model->id'><button type='submit' class='link'><span class='glyphicon glyphicon-eye-open'></span></button></form>";
                },
            ],
            'template' => '{view} {update}'
        ],
        ['attribute' => 'firstName', 'label' => 'الاسم'],
        ['attribute' => 'lastName', 'label' => 'اسم العائلة'],
        ['attribute' => 'fatherName', 'label' => 'اسم الأب'],
        ['attribute' => 'idNumber', 'label' => 'رقم السجل'],
        ['attribute' => 'familyCount', 'label' => 'عدد أفراد الأسرة'],
        ['attribute' => 'phone', 'label' => 'رقم الهاتف'],
        ['attribute' => 'city', 'label' => 'قضاء'],
        ['attribute' => 'status', 'label' => 'عنوان'],
        ['attribute' => 'maritalStatus', 'label' => 'عنوان'],
        ['attribute' => 'motherName', 'label' => 'اسم الأم'],
        ['attribute' => 'fixNumber', 'label' => 'رقم الهاتف الثابت'],
        ['attribute' => 'idLoc', 'label' => 'مكان السجل'],
        ['attribute' => 'gender', 'label' => 'الجنس'],
        ['attribute' => 'familyHead', 'label' => 'رب أسرة'],
        ['attribute' => 'familyHeadScLevel', 'label' => 'مستوى العلم'],
        ['attribute' => 'workType', 'label' => 'نوع العمل'],
        ['attribute' => 'countLess5', 'label' => 'عدد الأفراد دون أل 5'],
        ['attribute' => 'countLess18', 'label' => 'عدد الأفراد دون أل 18'],
        ['attribute' => 'countMore64', 'label' => 'عدد الأفراد فوق أل 64'],
        ['attribute' => 'countMore75', 'label' => 'عدد الأفراد فوق أل 75'],
        ['attribute' => 'countSick', 'label' => 'الحالات المرضية'],
        ['attribute' => 'sickConditions', 'label' => 'نوع الحالات المرضية'],

    ],
    'summary' => ''
]) ?>




