<?php

/* @var $this yii\web\View */
/* @var $model \app\models\Payment */
/* @var $saved boolean */

$this->title = 'دفعة جديدة';

$form = \yii\bootstrap\ActiveForm::begin([
    'id' => 'payment-form',
    'layout' => 'default',
    'fieldConfig' => [
        'template' => "{label}{error}\n{beginWrapper}\n{input}\n{hint}\n{endWrapper}",
    ],
]);

$all = \app\models\SupList::find()->all();
$selected = null;
if (Yii::$app->request->get('supportId')) {
    $selected = Yii::$app->request->get('supportId');
}

if ($model && $model->supportId) {
    $selected = $model->supportId;
}

?>

<style>
    .row {
        direction: rtl;
    }

    .alert {
        direction: rtl;
    }
</style>
<?php if ($saved): ?>
    <?= \yii\bootstrap\Alert::widget([
        'options' => [
            'class' => 'alert-info',
        ],
        'id' => 'alert',
        'closeButton' => false,
        'body' => 'تم إدخال المعلومات بنجاح',
    ]); ?>
<?php endif; ?>

<div class="row">
    <?= $form->field($model, 'supportId')->label('طلب')->dropDownList(\yii\helpers\ArrayHelper::merge(['' => null], \yii\helpers\ArrayHelper::map($all, 'id', 'fullName'))) ?>
    <?= $form->field($model, 'type')->label('نوع الطلب') ?>
    <?= $form->field($model, 'value')->label('القيمة')->input('number') ?>
    <?= $form->field($model, 'donor')->label('الجهة المانحة') ?>
    <?= $form->field($model, 'month')->label('عن شهر')->dropDownList(array_combine([null, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12], ['', 'كانون الثاني', 'شباط', 'آذار', 'نيسان', 'أيار', 'حزيران', 'تموز', 'آب', 'أيلول', 'تشرين الأول', 'تشرين الثاني', 'كانون الأول'])) ?>
    <?= $form->field($model, 'payed')->label('قبض ؟')->dropDownList([null => null, 1 => 'نعم', 0 => 'كلا']) ?>


    <div class="form-group">
        <div class="">
            <?= \yii\bootstrap\Html::submitButton('إدخال', ['class' => 'btn btn-danger']) ?>
        </div>
    </div>
</div>


<?php \yii\bootstrap\ActiveForm::end() ?>

<script>
    window.addEventListener('load', function () {
        setTimeout(function () {
            $('#alert').hide(200)
        }, 3000)
    })
</script>

<script>
    window.addEventListener('load', function () {
        $('#payment-supportid').val(<?=($selected ? $selected : '')?>)
    })
</script>