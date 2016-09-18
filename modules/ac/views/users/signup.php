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
                   <p class="text-center pv">SIGNUP TO GET INSTANT ACCESS.</p>

<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

<?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

<?= $form->field($model, 'password')->passwordInput() ?>

<?= $form->field($model, 'password_repeat')->passwordInput() ?>

<?= $form->field($model, 'nickname') ?>

<?= $form->field($model, 'birthday') ?>    

                    <div class="form-group">
<?= Html::submitButton('Create an account', ['class' => 'btn btn-block btn-primary', 'name' => 'signup-button']) ?>
                    </div>

<?php ActiveForm::end(); ?>


                   <p class="pt-lg text-center">Have an account?</p><a href="/ac/users/login" class="btn btn-block btn-default">Login</a>
                </div>
             </div>
             <!-- END panel-->
             <div class="p-lg text-center">
            <span>Copyright &copy; 2010-2016</span>
            <br>
            <span>The NIHIL Corporation</span>
         </div>
</div>