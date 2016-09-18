<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\support\models\Ticket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ref_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_id')->textInput() ?>

    <?= $form->field($model, 'type_id')->textInput() ?>

    <?= $form->field($model, 'status_id')->textInput() ?>

    <?= $form->field($model, 'priority_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reporter_id')->textInput() ?>

    <?= $form->field($model, 'assignee_id')->textInput() ?>

    <?= $form->field($model, 'date_reported')->textInput() ?>

    <?= $form->field($model, 'date_assigned')->textInput() ?>

    <?= $form->field($model, 'date_edited')->textInput() ?>

    <?= $form->field($model, 'date_estimated')->textInput() ?>

    <?= $form->field($model, 'date_resolved')->textInput() ?>

    <?= $form->field($model, 'time_estimated')->textInput() ?>

    <?= $form->field($model, 'time_actual')->textInput() ?>

    <?= $form->field($model, 'resolution_id')->textInput() ?>

    <?= $form->field($model, 'message')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'details')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'timestamp')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
