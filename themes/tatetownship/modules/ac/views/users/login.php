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
                   <a href="/">Tate Township</a>
                </div>
                <div class="panel-body">
                   <p class="text-center pv">SIGN IN TO CONTINUE.</p>

              <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

              <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

              <?= $form->field($model, 'password')->passwordInput() ?>

              <div class="row">
                <div class="col-sm-6">
              <?= $form->field($model, 'rememberMe')->checkbox() ?>
                </div>
                <div class="col-sm-6">
              <div class="pull-right"><a href="/ac/users/forgot-password" class="text-muted" style="margin-top: 10px;display: block;">Forgot password?</a></div>
                </div>
              </div>



    
              <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-block btn-primary', 'name' => 'login-button']) ?>
              </div>

              <?php ActiveForm::end(); ?>

                   <p class="pt-lg text-center">Need to Signup?</p><a href="/ac/users/signup" class="btn btn-block btn-default">Signup Now</a>
                </div>
             </div>
             <!-- END panel-->
             <div class="p-lg text-center">
    <span>Copyright &copy; 2010-2016</span>
            <br>
            <span>The NIHIL Corporation</span>
         </div>
</div>