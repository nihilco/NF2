<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\library\models\Book;
use app\modules\library\models\Image;
/* @var $this yii\web\View */
/* @var $model app\modules\library\models\BookImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-image-form">

    <?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'book_id')->dropdownList(
    Book::find()->select(['title', 'id'])->indexBy('id')->column(),
    ['prompt'=>'Select Book']
);?>

<?= $form->field($model, 'image_id')->dropdownList(
    Image::find()->select(['image', 'id'])->indexBy('id')->column(),
    ['prompt'=>'Select Image']
);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
