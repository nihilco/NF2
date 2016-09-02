<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\support\models\TicketType */

$this->title = 'Create Ticket Type';
$this->params['breadcrumbs'][] = ['label' => 'Ticket Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
