<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\InvoiceStatus */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Invoice Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper">
  <div class="content-heading">
     <?= Html::encode($this->title) ?>
     <small>catchphrase</small>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="invoice-status-view">

      </div>
    </div>
  </div>
</div>
