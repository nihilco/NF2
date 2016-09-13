<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\core\models\Theme */

$this->title = 'Create Theme';
$this->params['breadcrumbs'][] = ['label' => 'Themes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper">
  <div class="content-heading">
     <?= Html::encode($this->title) ?>
     <small>catchphrase</small>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="theme-create">
        <?= $this->render('_form', [
          'model' => $model,
        ]) ?>
      </div>
    </div>
  </div>
</div>