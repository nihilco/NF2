<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\library\models\BookPrinting */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Book Printings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper">
  <div class="content-heading">
     <?= Html::encode($this->title) ?>
     <small>catchphrase</small>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="book-printing-details">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'book_id',
            'publisher_id',
            'edition_id',
            'format_id',
            'printing',
            'number_line',
            'paid',
            'value',
            'sell',
            'quantity',
            'signed',
            'personalized',
            'date_published',
            'date_bought',
            'date_created',
            'date_updated',
        ],
    ]) ?>
    
      </div>
    </div>
  </div>
</div>