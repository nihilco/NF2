<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\User */

?>

<div class="block-center mt-xl wd-xl">
             <!-- START panel-->
             <div class="panel panel-dark panel-flat">
                <div class="panel-heading text-center">
                   <a href="/">NIHIL Framework</a>
                </div>
                <div class="panel-body">
                   <p class="text-center pv">FORGOT PASSWORD?</p>
<?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
<p class="text-center">Fill with your mail to receive instructions on how to reset your password.</p>
<?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                    <div class="form-group">
<?= Html::submitButton('Send', ['class' => 'btn btn-danger btn-block']) ?>
                    </div>

<?php ActiveForm::end(); ?>

                </div>
             </div>
             <!-- END panel-->
             <div class="p-lg text-center">
            <span>Copyright &copy; 2010-2016</span>
            <br>
            <span>The NIHIL Corporation</span>
         </div>
      </div>



