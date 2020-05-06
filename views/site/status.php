<?php

/* @var $this yii\web\View */

/* @var $model \app\models\forms\SupportForm */

$this->title = 'حالة الطلب';

use yii\bootstrap\ActiveForm;
use \yii\bootstrap\Html;

$newId = Yii::$app->request->get('new');
$supportId = Yii::$app->request->post('supportId');
?>

<style>
    .container {
        direction: rtl;
    }
    table th{
        text-align: right;
    }
</style>

<?php if ($newId): ?>
    <div style="text-align: center">
        <h1>لقد تم إدخال الطلب بنجاح</h1>
        <h1>لمراجعة الطلب الرجاء إستعمال الرقم التالي</h1>
        <p><?= \yii\bootstrap\Html::label($newId, '', ['class' => 'btn btn-lg btn-success']) ?></p>
    </div>
<?php else: ?>
    <?php if ($supportId): ?>
        <?php $model = \app\models\SupList::findOne($supportId); ?>
        <?php if ($model): ?>
            <div style="text-align: center;width: 100%">
                <?php $provider = new \yii\data\ActiveDataProvider(['query' => \app\models\Payment::find()->where(['supportId' => $model->id])]) ?>
                <?php $columns = [
                    ['attribute' => 'type', 'label' => 'نوع الطلب'],
                    ['attribute' => 'value', 'label' => 'القيمة'],
                    ['attribute' => 'donor', 'label' => 'الجهة المانحة'],
                    ['attribute' => 'month', 'label' => 'عن شهر'],
                    ['attribute' => 'payed', 'label' => 'قبض ؟'],
                ];
                if (!Yii::$app->user->isGuest) {
                    $columns[] = [
                        'class' => \yii\grid\ActionColumn::className(),
                        'buttons' => [
                            'edit' => function ($url, $model, $key) {
                                return \yii\bootstrap\Html::a(\yii\bootstrap\Html::tag('span', '', ['class' => "glyphicon glyphicon-pencil"]), ['/site/payment', 'id' => $model->id, 'update' => true]);
                            },
                        ],
                        'template' => '{edit}'
                    ];
                }
                ?>
                <?= \yii\grid\GridView::widget([
                    'dataProvider' => $provider,
                    'columns' => $columns,
                    'summary' => ''
                ]) ?>
            </div>
        <?php else: ?>
            <div style="text-align: center;width: 100%">
                <h3>لا يوجد طلب بهذا الرقم</h3>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div>
            <form class="form-group" method="post">
                <h3><label for="supportId">رقم الطلب</label></h3>
                <input type="number" name="supportId" required class="form-control"
                       style="width: 320px;margin-bottom: 8px">
                <input type="submit" value="متابعة" class="btn btn-success">
            </form>
        </div>
    <?php endif; ?>
<?php endif ?>
<style>
    .form-group {
        direction: rtl;
    }
</style>


