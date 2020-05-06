<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'تسجيل الدخول';

?>

<style>
    .container {
        direction: rtl;
    }
</style>

<div class="site-login" style="width: 320px;margin: auto; margin-top: 52px">
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'default',
        'fieldConfig' => [
            'template' => "{label}{error}\n{beginWrapper}\n{input}\n{hint}\n{endWrapper}",
        ],
    ]); ?>

    <?= $form->field($model, 'username')->label('اسم المستخدم')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'password')->label('كلمة المرور')->passwordInput() ?>

    <div class="form-group" style="text-align: center">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('أدخل', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
