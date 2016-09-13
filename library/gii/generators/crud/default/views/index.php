<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>

use yii\helpers\Html;
<?= $generator->enablePjax ? 'use yii\widgets\Pjax;' : '' ?>

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content-wrapper">
  <div class="content-heading">
     <?= "<?= " ?>Html::encode($this->title) ?>
     <small>catchphrase</small>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index">
        <h1><?= "<?= " ?>$this->context->action->uniqueId ?></h1>
        <p>
          This is the view content for action "<?= "<?= " ?>$this->context->action->id ?>".
          The action belongs to the controller "<?= "<?= " ?>get_class($this->context) ?>"
          in the "<?= "<?= " ?>$this->context->module->id ?>" module.
        </p>
        <p>
          You may customize this page by editing the following file:<br>
          <code><?= "<?= " ?>__FILE__ ?></code>
        </p>
      </div>
    </div>
  </div>
</div>
