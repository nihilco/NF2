<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\support\models\search\TicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tickets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ticket', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ref_code',
            'parent_id',
            'type_id',
            'status_id',
            // 'priority_id',
            // 'name',
            // 'slug',
            // 'reporter_id',
            // 'assignee_id',
            // 'date_reported',
            // 'date_assigned',
            // 'date_edited',
            // 'date_estimated',
            // 'date_resolved',
            // 'time_estimated',
            // 'time_actual',
            // 'resolution_id',
            // 'message',
            // 'details:ntext',
            // 'timestamp',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
