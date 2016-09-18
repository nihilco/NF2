<?php

namespace app\modules\ecom\models\forms;

use yii\base\Model;
use yii\helpers\ArrayHelper;
use app\modules\ecom\models\Invoice;
use app\modules\ecom\models\Payment;

/**
 * CreateAccountForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class PayInvoiceForm extends Model
{
    public $invoice_id;
    public $stripe_token;
    public $notes;
    
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // 
            [['invoice_id', 'stripe_token'], 'required'],
            [['stripe_token', 'invoice_id', 'notes'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'invoice_id' => 'Invoice ID',
            'stripe_token' => 'Stripe Token',
            'notes' => 'Notes',
        ];
    }

    public function load($data, $formName = null)
    {
        $this->stripe_token = ($data['stripe_token']) ? $data['stripe_token'] : null;
        $this->invoice_id = ($data['invoice_id']) ? $data['invoice_id'] : null;
        $this->notes = ($data['notes']) ? $data['notes'] : null;

        return true;
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function process()
    {
        if (!$this->validate()) {
            die('invalid');
            return false;
        }

        $invoice = Invoice::find()->where(['auth_key' => $this->invoice_id])->one();

        $charge = \Yii::$app->stripe->charge->createCharge(
            ($invoice->total * 100),
            $this->stripe_token,
            "Payment towards Invoice #" . $invoice->number,
            'usd',
            ['notes' => $this->notes]
        );

        // create payment
        $payment = new Payment();
        $payment->payment_type_id = 3;
        $payment->invoice_id = $invoice->id;
        $payment->user_id = \Yii::$app->user->id;
        $payment->anonymous = 0;
        $payment->amount = $invoice->total;
        $payment->reference_number = $charge->id;
        $payment->notes = $this->notes;

        // mark invoice as paid
        $invoice->invoice_status_id = 5;
        $invoice->date_paid = date("Y-m-d H:i:s");
        
        if(!$payment->save() || !$invoice->save()) {
            die('no save');
            return false;
        }

        // generate receipt and email it
        
        return true;
    }

}