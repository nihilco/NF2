<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\InvoiceType */

$this->title = 'Update Invoice Type: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Invoice Types', 'url' => ['index']];
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
      <div class="invoice-type-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
      </div>
    </div>
  </div>
</div>