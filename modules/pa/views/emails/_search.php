<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\pa\models\search\EmailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="email-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'email_type_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'auth_key') ?>

    <?= $form->field($model, 'subject') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'html') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'date_opened') ?>

    <?php // echo $form->field($model, 'date_last_viewed') ?>

    <?php // echo $form->field($model, 'total_views') ?>

    <?php // echo $form->field($model, 'timestamp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
