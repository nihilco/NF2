<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\library\models\BookAuthor */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Book Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper">
  <div class="content-heading">
     <?= Html::encode($this->title) ?>
     <small>catchphrase</small>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="book-author-view">

      </div>
    </div>
  </div>
</div>
