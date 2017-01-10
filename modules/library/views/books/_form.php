<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\library\models\Language;
use app\modules\library\models\Series;
use app\modules\library\models\Edition;

/* @var $this yii\web\View */
/* @var $model app\modules\library\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'language_id')->dropdownList(
    Language::find()->select(['name', 'id'])->indexBy('id')->column(),
    ['prompt'=>'Select Language']
);?>

    <?= $form->field($model, 'isbn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'edition_id')->dropdownList(
    Edition::find()->select(['name', 'id'])->indexBy('id')->column(),
    ['prompt'=>'Select Edition']
);?>

    <?= $form->field($model, 'date_first_published')->textInput() ?>

    <?= $form->field($model, 'rating')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'series_id')->dropdownList(
    Series::find()->select(['name', 'id'])->indexBy('id')->column(),
    ['prompt'=>'Select Series']
);?>

    <?= $form->field($model, 'order_in_series')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
