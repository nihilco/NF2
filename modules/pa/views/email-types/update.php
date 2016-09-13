<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\pa\models\EmailType */

$this->title = 'Update Email Type: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Email Types', 'url' => ['index']];
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
      <div class="email-type-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
      </div>
    </div>
  </div>
</div>