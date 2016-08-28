<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\Session */

$this->title = 'Update Session: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sessions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="content-wrapper">
  <div class="content-heading">
    Sessions Update
    <small>Are you sure you want to do this?</small>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="support-default-index">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


      </div>
    </div>
  </div>
</div>