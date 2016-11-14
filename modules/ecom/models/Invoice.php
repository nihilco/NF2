<?php

namespace app\modules\ecom\models;

use Yii;
use app\modules\ac\models\User;

/**
 * This is the model class for table "ecom_invoices".
 *
 * @property integer $id
 * @property integer $invoice_type_id
 * @property integer $invoice_status_id
 * @property integer $user_id
 * @property integer $currency_id
 * @property string $auth_key
 * @property string $number
 * @property integer $billing_address_id
 * @property integer $shipping_address_id
 * @property string $subtotal
 * @property string $shipping
 * @property string $vat
 * @property string $vat_rate
 * @property string $total
 * @property string $date_created
 * @property string $date_due
 * @property string $date_updated
 * @property string $date_closed
 * @property string $notes
 * @property string $timestamp
 *
 * @property InvoiceType $invoiceType
 * @property InvoiceStatus $invoiceStatus
 * @property User $user
 * @property Currency $currency
 * @property Address $billingAddress
 * @property Address $shippingAddress
 * @property Payment[] $payments
 * @property InvoiceItem[] $invoiceItems
 */
class Invoice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_invoices';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['invoice_type_id', 'invoice_status_id', 'user_id', 'currency_id', 'number', 'billing_address_id', 'shipping_address_id', 'subtotal', 'shipping', 'vat', 'total'], 'required'],
            [['invoice_type_id', 'invoice_status_id', 'user_id', 'currency_id', 'billing_address_id', 'shipping_address_id'], 'integer'],
            [['subtotal', 'shipping', 'vat', 'vat_rate', 'total'], 'number'],
            [['auth_key', 'date_created', 'date_due', 'date_updated', 'date_closed', 'timestamp'], 'safe'],
            [['notes'], 'string'],
            [['auth_key'], 'string', 'max' => 32],
            [['number'], 'string', 'max' => 128],
            [['number'], 'unique'],
            [['auth_key'], 'unique'],
            [['invoice_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => InvoiceType::className(), 'targetAttribute' => ['invoice_type_id' => 'id']],
            [['invoice_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => InvoiceStatus::className(), 'targetAttribute' => ['invoice_status_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::className(), 'targetAttribute' => ['currency_id' => 'id']],
            [['billing_address_id'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['billing_address_id' => 'id']],
            [['shipping_address_id'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['shipping_address_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'invoice_type_id' => 'Invoice Type ID',
            'invoice_status_id' => 'Invoice Status ID',
            'user_id' => 'User ID',
            'currency_id' => 'Currency ID',
            'auth_key' => 'Auth Key',
            'number' => 'Number',
            'billing_address_id' => 'Billing Address ID',
            'shipping_address_id' => 'Shipping Address ID',
            'subtotal' => 'Subotal',
            'shipping' => 'Shipping',
            'vat' => 'Vat',
            'vat_rate' => 'Vat Rate',
            'total' => 'Total',
            'date_created' => 'Date Created',
            'date_due' => 'Date Due',
            'date_updated' => 'Date Updated',
            'date_closed' => 'Date Closed',
            'notes' => 'Notes',
            'timestamp' => 'Timestamp',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->generateAuthKey();
                $this->date_created = date("Y-m-d H:i:s");
            }
            return true;
        }
        return false;
    }

    /**
     * Generates authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = \Yii::$app->security->generateRandomString();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoiceType()
    {
        return $this->hasOne(InvoiceType::className(), ['id' => 'invoice_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoiceStatus()
    {
        return $this->hasOne(InvoiceStatus::className(), ['id' => 'invoice_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::className(), ['id' => 'currency_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBillingAddress()
    {
        return $this->hasOne(Address::className(), ['id' => 'billing_address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShippingAddress()
    {
        return $this->hasOne(Address::className(), ['id' => 'shipping_address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['invoice_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoiceItems()
    {
        return $this->hasMany(InvoiceItem::className(), ['invoice_id' => 'id']);
    }
}
