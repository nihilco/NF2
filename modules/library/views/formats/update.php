<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\library\models\Format */

$this->title = 'Update Format: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Formats', 'url' => ['index']];
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
      <div class="format-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
      </div>
    </div>
  </div>
</div>