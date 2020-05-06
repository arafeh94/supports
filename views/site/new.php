<?php

/* @var $this yii\web\View */

/* @var $model \app\models\forms\SupportForm */

use kartik\date\DatePicker;

$this->title = 'طلب جديد';

use yii\bootstrap\ActiveForm;
use \yii\bootstrap\Html;

$form = ActiveForm::begin([
    'id' => 'new-form',
    'layout' => 'default',
    'fieldConfig' => [
        'template' => "{label}{error}\n{beginWrapper}\n{input}\n{hint}\n{endWrapper}",
    ],
]);

$kada2s = [null, 'طرابلس', 'جبيل', 'كسروان', 'المتن', 'بعبدا', 'عاليه', 'الشوف', 'الهرمل', 'بعلبك', 'زحلة', 'البقاع', 'راشيا', 'عكار', 'زغرتا', 'بشري', 'البترون', 'الكورة', 'المنية', 'صيدا', 'صور', 'جزين', 'النبطية', 'حاصبيا', 'مرجعيون', 'بنت جبيل'];
$workTypes = [null, 'عاطل عن العمل', 'مدخول شهري'];
$marStatus = [null, 'عازب', 'متأهل', 'مطلق', 'ارمل'];
$scLevels = [null, 'أساسي', 'ثانوي', 'جامعي', 'مهني', 'روضة', 'غيره'];
$genders = [null, 'ذكر', 'أنثى'];
?>

<style>
    .container {
        direction: rtl;
    }

    @media (min-width: 767px) {
        .right {
            float: right;
        }

        .left {
            float: left;
        }
    }

    #suplist-birth-kvdate {
        direction: ltr;
    }

    .section-title {
        padding-top: 12px;
        padding-bottom: 12px;
        background-color: #003e7c;
        border-color: #007bff;
        color: white;
        padding-right: 12px;
        margin-top: 0 !important;
        border-radius: 0.25rem 0.25rem 0.25rem;

    }

    .borderless td, .borderless tr {
        border-top: none !important;
    }

    .section-header {
        font-weight: bold;
        font-size: x-large;
    }
</style>


<div class="row">

    <table class="table table-responsive borderless">
        <tr>
            <td colspan="2" class="section-header">قسم ١ : معلومات شخصية</td>
        </tr>
        <tr>
            <td><?= $form->field($model, 'firstName')->label('الاسم') ?></td>
            <td><?= $form->field($model, 'lastName')->label('اسم العائلة') ?></td>
        </tr>

        <tr>
            <td><?= $form->field($model, 'fatherName')->label('اسم الأب') ?></td>
            <td><?= $form->field($model, 'motherName')->label('اسم الأم') ?></td>
        </tr>

        <tr>
            <td><?= $form->field($model, 'gender')->label('الجنس')->dropDownList(array_combine($genders, $genders)); ?></td>

        </tr>

        <tr>
            <td colspan="2" class="section-header">قسم ٢ : هوية </td>
        </tr>
        <tr>
            <td><?= $form->field($model, 'idNumber')->label('رقم الهوية') ?></td>
            <td><?= $form->field($model, 'idNumber')->label('رقم إخراج القيد') ?></td>
        </tr>

        <tr>
            <td><?= $form->field($model, 'idNumber')->label('رقم جواز سفر') ?></td>
            <td><?= $form->field($model, 'birth')->label('تاريخ الميلاد')->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'Enter birth date ...'],
                    'removeButton' => false,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy/mm/dd'
                    ]
                ]); ?>
            </td>
        </tr>

        <tr>
            <td colspan="2" class="section-header">قسم ٣ : العائلة</td>
        </tr>
        <tr>
            <td><?= $form->field($model, 'familyHead')->label('هل أنت رب أسرة')->dropDownList([null => '', 1 => 'نعم', 0 => 'كلا']); ?></td>
            <td><?= $form->field($model, 'familyHeadScLevel')->label('مستوى العلم لرب  الأسرة')->dropDownList(array_combine($scLevels, $scLevels)) ?></td>
        </tr>

        <tr>
            <td><?= $form->field($model, 'maritalStatus')->label('الوضع العائلي')->dropDownList(array_combine($marStatus, $marStatus)); ?></td>
            <td><?= $form->field($model, 'familyCount')->label('عدد أفراد الأسرة') ?></td>
        </tr>

        <tr>
            <td><?= $form->field($model, 'countLess5')->label('عدد الأفراد دون أل 5') ?></td>
            <td><?= $form->field($model, 'countLess18')->label('عدد الأفراد دون أل 18') ?></td>
        </tr>
        <tr>
            <td><?= $form->field($model, 'countMore64')->label('عدد الأفراد فوق أل 64') ?></td>
            <td><?= $form->field($model, 'countMore75')->label('عدد الأفراد فوق أل 75') ?></td>
        </tr>
        <tr>
            <td><?= $form->field($model, 'countSick')->label('عدد الأفراد ذوي الحالات المرضية') ?></td>
            <td><?= $form->field($model, 'sickConditions')->label('الحالات المرضية الموجودة في الأسرة') ?></td>
        </tr>


        <tr>
            <td><?= $form->field($model, 'workType')->label('نوع العمل')->dropDownList(array_combine($workTypes, $workTypes)); ?></td>
            <td><?= $form->field($model, 'workValue')->label('قيمة المدخول')->input('number', ['disabled' => true]); ?></td>
        </tr>


        <tr>
            <td colspan="2" class="section-header">قسم ٤ : للتواصل</td>
        </tr>

        <tr>
            <td><?= $form->field($model, 'phone')->label('رقم الهاتف الخليوي') ?></td>
            <td><?= $form->field($model, 'fixNumber')->label('رقم الهاتف الثابت') ?></td>
        </tr>
        <tr>
            <td><?= $form->field($model, 'city')->label('قضاء')->dropDownList(array_combine($kada2s, $kada2s)); ?></td>
            <td><?= $form->field($model, 'idLoc')->label('مكان السجل') ?></td>
        </tr>

        <tr>
            <td colspan="2"><?= $form->field($model, 'address')->label('العنوان')->textarea(['style' => 'resize: none;']) ?></td>
        </tr>

        <tr>
            <td colspan="2" class="section-header">
                <div class="form-group">
                    <div class="">
                        <?= Html::submitButton('إدخال', ['class' => 'btn btn-danger', 'style' => 'width:98px']) ?>
                    </div>
                </div>
            </td>
        </tr>

    </table>


</div>


<?php ActiveForm::end() ?>


<script>


    function updateProps(value) {
        if (value === 'مدخول شهري') {
            $('#suplist-workvalue').prop("disabled", false);
        } else {
            $('#suplist-workvalue').prop("disabled", true);
        }
    }

    window.addEventListener('load', function () {
        let element = $('#suplist-worktype');
        updateProps(element.val());
        element.on('change', function () {
            updateProps(this.value)
        })
    })
</script>

