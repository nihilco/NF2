<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\search\SessionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="session-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'start') ?>

    <?= $form->field($model, 'last_action') ?>

    <?= $form->field($model, 'expire') ?>

    <?= $form->field($model, 'data') ?>

    <?= $form->field($model, 'ip_address') ?>

    <?= $form->field($model, 'user_agent') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
