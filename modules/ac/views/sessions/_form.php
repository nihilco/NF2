<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\Session */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="session-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'start')->textInput() ?>

    <?= $form->field($model, 'last_action')->textInput() ?>

    <?= $form->field($model, 'expire')->textInput() ?>

    <?= $form->field($model, 'data')->textInput() ?>

    <?= $form->field($model, 'ip_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_agent')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
