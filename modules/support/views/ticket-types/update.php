<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\support\models\TicketType */

$this->title = 'Update Ticket Type: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ticket Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ticket-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
