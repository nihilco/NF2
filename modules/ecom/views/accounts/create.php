<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\core\models\Country;
use app\modules\ac\models\User;

/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\Account */

$this->title = 'Create Account';
$this->params['breadcrumbs'][] = ['label' => 'Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper">
  <div class="content-heading">
     <?= Html::encode($this->title) ?>
     <small>catchphrase</small>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="account-create">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'accountType')->radioList(['individual' => 'Individual', 'business' => 'Business']); ?>

        <?= $form->field($model, 'user_id')->dropdownList(ArrayHelper::map(User::find()->indexBy('id')->all(), 'id', 'email')); ?>
    
        <?= $form->field($model, 'businessName')->textInput(); ?>
        <?= $form->field($model, 'businessTaxId')->textInput(); ?>

        <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]); ?>
        <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]); ?>
        <?= $form->field($model, 'dob')->textInput(['maxlength' => true]); ?>
        <?= $form->field($model, 'ssn')->textInput(['maxlength' => true]); ?>
        <?= $form->field($model, 'address1')->textInput(['maxlength' => true]); ?>
        <?= $form->field($model, 'address2')->textInput(['maxlength' => true]); ?>
        <?= $form->field($model, 'city')->textInput(['maxlength' => true]); ?>
        <?= $form->field($model, 'state')->textInput(['maxlength' => true]); ?>
        <?= $form->field($model, 'postalCode')->textInput(['maxlength' => true]); ?>
        <?= $form->field($model, 'country_id')->dropdownList(ArrayHelper::map(Country::find()->indexBy('id')->all(), 'id', 'code')); ?>

        <?= $form->field($model, 'tosAccept')->checkbox(); ?>

    <div class="form-group">
        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
      </div>
    </div>
  </div>
</div>