<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ecom\models\search\CurrencySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Currencies';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper">
  <div class="content-heading">
     <?= Html::encode($this->title) ?>
     <small>catchphrase</small>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="currency-index">
        <h1><?= $this->context->action->uniqueId ?></h1>
        <p>
          This is the view content for action "<?= $this->context->action->id ?>".
          The action belongs to the controller "<?= get_class($this->context) ?>"
          in the "<?= $this->context->module->id ?>" module.
        </p>
        <p>
          You may customize this page by editing the following file:<br>
          <code><?= __FILE__ ?></code>
        </p>
      </div>
    </div>
  </div>
</div>
