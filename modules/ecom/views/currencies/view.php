<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\Currency */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Currencies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper">
  <div class="content-heading">
     <?= Html::encode($this->title) ?>
     <small>catchphrase</small>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="currency-view">

      </div>
    </div>
  </div>
</div>
