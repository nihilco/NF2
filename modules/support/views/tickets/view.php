<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\support\models\Ticket */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'ref_code',
            'parent_id',
            'type_id',
            'status_id',
            'priority_id',
            'name',
            'slug',
            'reporter_id',
            'assignee_id',
            'date_reported',
            'date_assigned',
            'date_edited',
            'date_estimated',
            'date_resolved',
            'time_estimated',
            'time_actual',
            'resolution_id',
            'message',
            'details:ntext',
            'timestamp',
        ],
    ]) ?>

</div>
