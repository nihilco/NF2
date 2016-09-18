<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ecom\models\search\AccountStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Account Statuses';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper">
  <div class="content-heading">
     <?= Html::encode($this->title) ?>
     <small>catchphrase</small>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="account-status-list">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Account Status', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'description:ntext',
            'date_created',
            //'timestamp',

            ['class' => 'app\library\grid\ActionColumn'],
        ],
    ]); ?>
    
      </div>
    </div>
  </div>
</div>
