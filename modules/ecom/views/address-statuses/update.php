<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\AddressStatus */

$this->title = 'Update Address Status: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Address Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="content-wrapper">
  <div class="content-heading">
     <?= Html::encode($this->title) ?>
     <small>catchphrase</small>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="address-status-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
      </div>
    </div>
  </div>
</div>