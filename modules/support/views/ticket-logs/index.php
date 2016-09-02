<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\support\models\search\TicketLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ticket Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-log-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ticket Log', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ticket_id',
            'user_id',
            'resource_id',
            'timestamp',
            // 'ip_address',
            // 'user_agent',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
