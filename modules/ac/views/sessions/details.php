<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\Session */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sessions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper">
  <div class="content-heading">
    Session Details
    <small>What are they doing?</small>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="support-default-index">

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
            'user_id',
            'start',
            'expire',
            'data',
            'ip_address',
            'user_agent',
        ],
    ]) ?>

      </div>
    </div>
  </div>
</div>