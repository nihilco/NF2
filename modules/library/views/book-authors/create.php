<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\library\models\BookAuthor */

$this->title = 'Create Book Author';
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
      <div class="book-author-create">
        <?= $this->render('_form', [
          'model' => $model,
        ]) ?>
      </div>
    </div>
  </div>
</div>