<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\AddressStatus */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Address Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper">
  <div class="content-heading">
     <?= Html::encode($this->title) ?>
     <small>catchphrase</small>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="address-status-view">

      </div>
    </div>
  </div>
</div>
