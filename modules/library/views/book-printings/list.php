<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\library\models\search\BookPrintingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Book Printings';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper">
  <div class="content-heading">
     <?= Html::encode($this->title) ?>
     <small>catchphrase</small>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="book-printing-list">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Book Printing', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'book_id',
            //'publisher_id',
            'edition_id',
            'format_id',
            'printing',
            // 'number_line',
            'paid',
            'price',
            'value',
            // 'sell',
            'quantity',
            'signed',
            'personalized',
            // 'date_published',
            // 'date_bought',
            // 'date_created',
            // 'date_updated',

            ['class' => 'app\library\grid\ActionColumn'],
        ],
    ]); ?>
    
      </div>
    </div>
  </div>
</div>
