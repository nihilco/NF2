<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\modules\ac\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ecom\models\search\InvoiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Invoices';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper">
  <div class="content-heading">
     <?= Html::encode($this->title) ?>
     <small>catchphrase</small>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="invoice-list">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Invoice', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'invoice_type_id',
            [
                'label' => 'Type',
                'attribute'=>'invoiceType.name',
            ],
            //'invoice_status_id',
            [
                'label' => 'Status',
                'attribute'=>'invoiceStatus.name',
            ],
            //'user_id',
            [
                'label' => 'User',
                'attribute'=>'user.email',
            ],
            //'currency_id',
            // 'auth_key',
            'number',
            // 'billing_address_id',
            // 'shipping_address_id',
            //'subtotal',
            // 'shipping',
            // 'vat',
            // 'vat_rate',
            'total',
            'date_created',
            'date_due',
            // 'date_updated',
            // 'date_closed',
            // 'notes:ntext',
            // 'timestamp',

            ['class' => 'app\library\grid\ActionColumn'],
        ],
    ]); ?>
    
      </div>
    </div>
  </div>
</div>
