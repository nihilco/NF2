<?php

namespace app\modules\ecom\components\stripe;

use yii\helpers\Html;
use app\modules\ecom\components\stripe\StripeForm;

?>

<!-- Modal -->
<div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-labelledby="payModalLabel">

<?php
$form = StripeForm::begin([
  'action' => '/ecom/invoices/pay',
  'id' => 'payment-form',
  'tokenInputName' => 'stripe_token',
  'errorContainerId' => 'payment-errors',
  'brandContainerId' => 'cc-brand',
  'errorClass' => 'has-error',
  'applyJqueryPaymentFormat' => true,
  'applyJqueryPaymentValidation' => true,
  'options' => ['autocomplete' => 'on']
]);
?>

  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Pay Invoice <small>#<?= $invoice->number ?></small></h4>
      </div>
      <div class="modal-body">

<div id="payment-errors"></div>

<?= Html::hiddenInput('invoice_id', $invoice->auth_key) ?>
    
<div class="row">
  <div class="col-sm-8">
     <div class="form-group">
         <label for="number" class="control-label">Card number</label>
         <span id="cc-brand"></span>
         <?= $form->numberInput() ?>
     </div>
  </div>
  <div class="col-sm-4">
     <div class="form-group">
         <label for="cvc" class="control-label">CVC</label>
<?= $form->cvcInput() ?>
     </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
     <div class="form-group">
         <label for="name" class="control-label">Name on Card</label>
<?= $form->nameInput() ?>
     </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-6">
     <div class="form-group">
         <label for="exp" class="control-label">Card expiry</label>
<?= $form->expInput() ?>
     </div>
  </div>
  <div class="col-sm-6">
     <div class="form-group">
         <label for="postal-code" class="control-label">Zipcode</label>
<?= $form->postalCodeInput() ?>
     </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
     <div class="form-group">
         <label for="name" class="control-label">Comments</label>
<?= Html::textarea('notes', '', ['class' => 'form-control']) ?>
     </div>
  </div>
</div>    
      </div>
      <div class="modal-footer">
<?= Html::submitButton('Pay $' . $invoice->total, ['class' => 'btn btn-block btn-success']); ?>
      </div>
    </div>
  </div>
    <?php StripeForm::end(); ?>
</div>





