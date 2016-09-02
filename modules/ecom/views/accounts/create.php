<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\Account */

$this->title = 'Create Account';
$this->params['breadcrumbs'][] = ['label' => 'Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper">
  <div class="content-heading">
    Create Account
     <small>New seller?</small>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="ecom-accounts-create">

        <?php $form = ActiveForm::begin(['id' => 'form-account-create']); ?>

<?= $form->field($model, 'user_id')->dropDownList($model->getUserArray());?>

<?= $form->field($model, 'country_id')->dropDownList($model->getCountryArray());?>
<?= $form->field($model, 'managed')->checkbox() ?>    

                    <div class="form-group">
<?= Html::submitButton('Create account', ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
                    </div>

<?php ActiveForm::end(); ?>
    
      </div>
    </div>
  </div>
</div>