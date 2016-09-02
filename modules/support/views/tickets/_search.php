<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\support\models\search\TicketSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ref_code') ?>

    <?= $form->field($model, 'parent_id') ?>

    <?= $form->field($model, 'type_id') ?>

    <?= $form->field($model, 'status_id') ?>

    <?php // echo $form->field($model, 'priority_id') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'slug') ?>

    <?php // echo $form->field($model, 'reporter_id') ?>

    <?php // echo $form->field($model, 'assignee_id') ?>

    <?php // echo $form->field($model, 'date_reported') ?>

    <?php // echo $form->field($model, 'date_assigned') ?>

    <?php // echo $form->field($model, 'date_edited') ?>

    <?php // echo $form->field($model, 'date_estimated') ?>

    <?php // echo $form->field($model, 'date_resolved') ?>

    <?php // echo $form->field($model, 'time_estimated') ?>

    <?php // echo $form->field($model, 'time_actual') ?>

    <?php // echo $form->field($model, 'resolution_id') ?>

    <?php // echo $form->field($model, 'message') ?>

    <?php // echo $form->field($model, 'details') ?>

    <?php // echo $form->field($model, 'timestamp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
