<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\tatetownship\models\News */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper">
  <div class="content-heading">
     <?= Html::encode($this->title) ?>
     <small>catchphrase</small>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="news-view">

      </div>
    </div>
  </div>
</div>
