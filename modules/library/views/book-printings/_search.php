<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\library\models\search\BookPrintingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-printing-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'book_id') ?>

    <?= $form->field($model, 'publisher_id') ?>

    <?= $form->field($model, 'edition_id') ?>

    <?= $form->field($model, 'format_id') ?>

    <?php // echo $form->field($model, 'printing') ?>

    <?php // echo $form->field($model, 'number_line') ?>

    <?php // echo $form->field($model, 'paid') ?>

    <?php // echo $form->field($model, 'value') ?>

    <?php // echo $form->field($model, 'sell') ?>

    <?php // echo $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'signed') ?>

    <?php // echo $form->field($model, 'personalized') ?>

    <?php // echo $form->field($model, 'date_published') ?>

    <?php // echo $form->field($model, 'date_bought') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'date_updated') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
