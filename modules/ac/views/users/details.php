<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper">
  <div class="content-heading">
    User Details
    <small>Stalk people much?</small>
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
            'stripe_customer_id',
            'email:email',
            'password',
            'nickname',
            'date_registered',
            'date_updated',
            'date_last_login',
            'login_attempts',
            'auth_key',
            'timestamp',
        ],
    ]) ?>

      </div>
    </div>
  </div>
</div>