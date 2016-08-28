<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\User */

$this->title = 'Update User: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="content-wrapper">
  <div class="content-heading">
    Users Update
    <small>Who are all these people?</small>
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