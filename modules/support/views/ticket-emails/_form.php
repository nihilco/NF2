<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\support\models\TicketEmail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-email-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'recipient_email')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sender_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sender_email')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'timestamp')->textInput() ?>

    <?= $form->field($model, 'subject')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
