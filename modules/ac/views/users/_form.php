<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'stripe_customer_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_registered')->textInput() ?>

    <?= $form->field($model, 'date_updated')->textInput() ?>

    <?= $form->field($model, 'date_last_login')->textInput() ?>

    <?= $form->field($model, 'login_attempts')->textInput() ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'timestamp')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
