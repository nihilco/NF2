<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\library\models\Book;
use app\modules\library\models\Edition;
use app\modules\library\models\Format;
use app\modules\library\models\Publisher;

/* @var $this yii\web\View */
/* @var $model app\modules\library\models\BookPrinting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-printing-form">

    <?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'book_id')->dropdownList(
    Book::find()->select(['title', 'id'])->indexBy('id')->column(),
    ['prompt'=>'Select Book']
);?>

<?= $form->field($model, 'publisher_id')->dropdownList(
    Publisher::find()->select(['name', 'id'])->indexBy('id')->column(),
    ['prompt'=>'Select Publisher']
);?>

<?= $form->field($model, 'format_id')->dropdownList(
    Format::find()->select(['name', 'id'])->indexBy('id')->column(),
    ['prompt'=>'Select Format']
);?>

    <?= $form->field($model, 'printing')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number_line')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sell')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'signed')->checkbox() ?>

    <?= $form->field($model, 'personalized')->checkbox() ?>

    <?= $form->field($model, 'date_published')->textInput() ?>

    <?= $form->field($model, 'date_bought')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
