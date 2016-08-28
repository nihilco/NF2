<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\Session */

$this->title = 'Create Session';
$this->params['breadcrumbs'][] = ['label' => 'Sessions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper">
  <div class="content-heading">
    Session Create
    <small>You sure you need to do this?</small>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="support-default-index">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

      </div>
    </div>
  </div>
</div>