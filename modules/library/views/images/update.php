<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\library\models\Image */

$this->title = 'Update Image: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="content-wrapper">
  <div class="content-heading">
     <?= Html::encode($this->title) ?>
     <small>catchphrase</small>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="image-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
      </div>
    </div>
  </div>
</div>