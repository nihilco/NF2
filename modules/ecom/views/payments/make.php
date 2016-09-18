<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\Payment */

$this->title = 'Create Payment';
$this->params['breadcrumbs'][] = ['label' => 'Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper">
  <div class="content-heading">
     <?= Html::encode($this->title) ?>
     <small>catchphrase</small>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="payment-create">

        <?php $form = ActiveForm::begin(); ?>

          <?php if(!$model->amount) { echo $form->field($model, 'amount'); } ?>

          <?php if(!$model->email) { echo $form->field($model, 'email'); } ?>

          <?= $form->field($model, 'number')->textInput() ?>

          <div class="row">
            <div class="col-sm-3">
<?= $form->field($model, 'exp_month')->dropDownList($model->getMonthArray(), ['prompt'=>'']);?>
            </div>
            <div class="col-sm-3">
<?= $form->field($model, 'exp_year')->dropDownList($model->getYearArray(),['prompt'=>'']);?>
            </div>
            <div class="col-sm-6">
              <?= $form->field($model, 'cvc') ?>
            </div>
          </div>

          <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

          <div class="form-group">
            <?= Html::submitButton('Pay Now', ['class' => 'btn btn-success']) ?>
          </div>

    <?php ActiveForm::end(); ?>
    
      </div>
    </div>
  </div>
</div>