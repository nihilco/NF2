<?php

use yii\helpers\Html;
use yii\web\JsExpression;
use app\modules\ecom\components\stripe\StripeForm;

/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\Invoice */

$this->title = 'Invoice ' . $model->number;
$this->params['breadcrumbs'][] = ['label' => 'Invoices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;



function escapeJavaScriptText($string)
{
    return str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$string), "\0..\37'\\")));
}



?>

<!-- Page content-->
             <div class="content-wrapper">
                <h3>
<?php if (\Yii::$app->user->can('ecom.invoices.create')) { ?>
                   <a href="/ecom/invoices/create" class="btn btn-primary pull-right">
                      <em class="fa fa-plus-circle fa-fw mr-sm"></em>New Invoice
                   </a>
<?php } ?>
                   Invoice
                </h3>
                <div class="panel">
                   <div class="panel-body">
                      <button type="button" class="pull-right btn btn-default btn-sm">Copy this invoice</button>
                      <h3 class="mt0"><?= Html::encode($this->title) ?></h3>
                      <hr>
                      <div class="row mb-lg">
                         <div class="col-lg-4 col-xs-6 br pv">
                            <div class="row">
                               <div class="col-md-2 text-center visible-md visible-lg">
                                  <em class="fa fa-envelope fa-4x text-muted"></em>
                               </div>
                               <div class="col-md-10">
    <h4><?=$model->billingAddress->physicalBillingAddress->name ?>
<?php
    if($model->billingAddress->physicalBillingAddress->organization) {
        echo '<br /><small>' . $model->billingAddress->physicalBillingAddress->organization . '</small>';
    }
?>
    </h4>
                                  <address>
<?=$model->billingAddress->physicalBillingAddress->address1 ?>
<?php
    if($model->billingAddress->physicalBillingAddress->address2) {
        echo '<br />' . $model->billingAddress->physicalBillingAddress->address2;
    }
?>
    <br><?=$model->billingAddress->physicalBillingAddress->city ?>, <?=$model->billingAddress->physicalBillingAddress->state ?> <?=$model->billingAddress->physicalBillingAddress->postal_code ?>, <?=$model->billingAddress->physicalBillingAddress->country ?>
    </address>
</div>
                            </div>
                         </div>
                         <div class="col-lg-4 col-xs-6 br pv">
                            <div class="row">
                                <div class="col-md-2 text-center visible-md visible-lg">
                                  <em class="fa fa-truck fa-4x text-muted"></em>
                               </div>
                               <div class="col-md-10">
    <h4><?=$model->shippingAddress->physicalShippingAddress->name ?>
<?php
    if($model->shippingAddress->physicalShippingAddress->organization) {
        echo '<br /><small>' . $model->shippingAddress->physicalShippingAddress->organization . '</small>';
    }
?>
    </h4>
                                  <address>
<?=$model->shippingAddress->physicalShippingAddress->address1 ?>
<?php
    if($model->shippingAddress->physicalShippingAddress->address2) {
        echo '<br />' . $model->shippingAddress->physicalShippingAddress->address2;
    }
?>
    <br><?=$model->shippingAddress->physicalShippingAddress->city ?>, <?=$model->shippingAddress->physicalShippingAddress->state ?> <?=$model->shippingAddress->physicalShippingAddress->postal_code ?>, <?=$model->shippingAddress->physicalShippingAddress->country ?>
    </address>

                                  </div>
                            </div>
                         </div>
                         <div class="clearfix hidden-md hidden-lg">
                            <hr>
                         </div>
                         <div class="col-lg-4 col-xs-12 pv">
                            <div class="clearfix">
                               <p class="pull-left">INVOICE NO.</p>
                               <p class="pull-right mr"><span class="label label-default"><?= $model->invoiceStatus->name ?></span> <?= $model->number ?></p>
                            </div>
                            <div class="clearfix">
                               <p class="pull-left">Date</p>
                               <p class="pull-right mr"><?= date("m/d/Y" , strtotime($model->date_created)) ?></p>
                            </div>
                            <div class="clearfix">
                               <p class="pull-left">Due Date</p>
                               <p class="pull-right mr"><?= date("m/d/Y" , strtotime($model->date_due)) ?></p>
                            </div>
                        </div>
                      </div>
                      <div class="table-responsive table-bordered mb-lg">
                         <table class="table">
                            <thead>
                               <tr>
                                  <th>Item #</th>
                                  <th>Description</th>
                                  <th>Quantity</th>
                                  <th>Unit Price</th>
                                  <th class="text-right">Total</th>
                               </tr>
                            </thead>
                            <tbody>
    <?php
    if(count($model->invoiceItems) > 0) {
      foreach($model->invoiceItems as $ii) {
    ?>
                               <tr>
                                  <td><?= $ii->invoice_item_reference_number ?></td>
                                  <td><?= $ii->description ?></td>
                                  <td><?= $ii->quantity ?></td>
                                  <td>$ <?= $ii->unit_price ?></td>
                                  <td class="text-right">$ <?= $ii->subtotal ?></td>
                               </tr>
    <?php
      }
    }else{
    ?>
      <tr><td colspan="5">No invoice items</td></tr>
    <?php
    }
    ?>
                            </tbody>
                         </table>
                      </div>
                      <div class="row">
                         <div class="col-sm-offset-8 col-sm-4 pv">
                            <div class="clearfix">
                               <p class="pull-left">Subtotal</p>
                               <p class="pull-right mr">$ <?= $model->subtotal ?></p>
                            </div>
                            <div class="clearfix">
                               <p class="pull-left">Tax (<?= ($model->vat_rate * 100) ?>%)</p>
                               <p class="pull-right mr">$ <?= $model->vat ?></p>
                            </div>
                               <div class="clearfix">
                               <p class="pull-left">Shipping</p>
                               <p class="pull-right mr">$ <?= $model->shipping ?></p>
                            </div>
                            <div class="clearfix">
                               <p class="pull-left h3">GRAND TOTAL</p>
                               <p class="pull-right mr h3">$ <?= $model->total ?></p>
                            </div>
                         </div>
                      </div>
<?php if(count($model->payments) > 0) { ?>
    <hr class="hidden-print">
    <div class="row">
         <div class="col-sm-12">
         <h4>Payments</h4>
                       <div class="table-responsive table-bordered mb-lg">
                         <table class="table">
                            <thead>
                               <tr>
                                  <th>Date</th>
                                  <th>Reference Number</th>
                                  <th>Payment Type</th>
                                  <th>Amount</th>
                               </tr>
                            </thead>
                            <tbody>
    <?php
      foreach($model->payments as $payment) {
    ?>
                               <tr>
                                  <td><?= $payment->date_created ?></td>
                                  <td><?= $payment->reference_number ?></td>
                                  <td><?= $payment->paymentType->name ?></td>
                                  <td>$<?= $payment->amount ?></td>
                               </tr>
                               <tr>
                                 <td colspan="4"><?= $payment->notes ?></td>
                               </tr>
    <?php
      }
    ?>
                            </tbody>
                         </table>
                      </div>
         </div>
    </div>
<?php } ?>
                      <hr class="hidden-print">
                      <div class="clearfix">
                         <a href="/ecom/invoices/update?id=<?= $model->id ?>" class="btn btn-primary pull-left mr">Edit</a>
                         <button type="button" onclick="window.print();" class="btn btn-default pull-left mr">Print</button>
<?php if($model->total_paid != $model->total) { ?>  
    <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#payModal">Pay Invoice</button>
<?php } ?>
                         <a href="/ecom/invoices/send" class="btn btn-default pull-right mr">Send</a>
    <!-- Button trigger modal -->


                      </div>
                   </div>
                </div>
             </div>
    
<?php
    $v = $this->render('@app/modules/ecom/components/stripe/_form', ['invoice' => $model]);
    $this->registerJs('
function create() {
    var frag = document.createDocumentFragment(),
        temp = document.createElement(\'div\');
var strVar="";
strVar += "' . escapeJavaScriptText($v) . '";
    temp.innerHTML = strVar;
    while (temp.firstChild) {
        frag.appendChild(temp.firstChild);
    }
    return frag;
}

var fragment = create();
// You can use native DOM methods to insert the fragment:
document.body.insertBefore(fragment, document.body.childNodes[0]);',$this::POS_END);
?>



