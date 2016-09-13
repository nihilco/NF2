<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\Invoice */

$this->title = 'Pay Invoice';
$this->params['breadcrumbs'][] = ['label' => 'Invoices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper">
  <div class="content-heading">
     <?= Html::encode($this->title) ?>
     <small># <?= $model->invoice->number ?></small>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="invoice-create">


    
      </div>
    </div>
  </div>
</div>