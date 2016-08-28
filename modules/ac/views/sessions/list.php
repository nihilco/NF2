<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\ac\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ac\models\search\SessionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sessions';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper">
  <div class="content-heading">
    Sessions List
    <small>Who all is online?</small>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="support-default-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Session', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'user_id',
            [
                'attribute' => 'user_id',
                'label' => 'User',
                'value' => function($model) {
                    if($model->user_id) {
                        $u = User::find()->where(['id' => $model->user_id])->one();
                        return $u->email;
                    }
                }
            ],
            //'start',
            //'last_action',
            [
                'attribute' => 'last_action',
                'value' => function($model) {
                    if($model->last_action) {
                        return date("Y-m-d H:i:s", $model->last_action);
                    }
                }
            ],
            //'expire',
            [
                'attribute' => 'expire',
                'value' => function($model) {
                    if($model->expire) {
                        return date("Y-m-d H:i:s", $model->expire);
                    }
                }
            ],
            // 'data',
            //'ip_address',
            [
                'attribute' => 'ip_address',
                'value' => function($model) {
                    list($ip1, $ip2, $ip3, $ip4) = explode(".", $model->ip_address);
                    if(!\Yii::$app->user->can('ac.users.see-full-ip')) {
                        $ip3 = '0';
                        $ip4 = '0';
                    }
                    return $ip1 . '.' . $ip2 . '.' . $ip3 . '.' . $ip4;
                }
            ],
            'user_agent',

            [
                'class' => '\app\library\grid\ActionColumn',
            ],
        ],
    ]); ?>

      </div>
    </div>
  </div>
</div>