<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\library\models\Edition */

$this->title = 'Create Edition';
$this->params['breadcrumbs'][] = ['label' => 'Editions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper">
  <div class="content-heading">
     <?= Html::encode($this->title) ?>
     <small>catchphrase</small>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="edition-create">
        <?= $this->render('_form', [
          'model' => $model,
        ]) ?>
      </div>
    </div>
  </div>
</div>