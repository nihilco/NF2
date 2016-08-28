<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ac\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper">
  <div class="content-heading">
    Users List
    <small>Who are all these people?</small>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="support-default-index">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'stripe_customer_id',
            'email:email',
            //'password',
            'nickname',
            'date_registered',
            'date_updated',
            'date_last_login',
            // 'login_attempts',
            // 'auth_key',
            // 'timestamp',

            ['class' => 'app\library\grid\ActionColumn'],
        ],
    ]); ?>

      </div>
    </div>
  </div>
</div>