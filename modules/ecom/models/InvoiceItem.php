<?php

namespace app\modules\ecom\models;

use Yii;

/**
 * This is the model class for table "ecom_invoice_items".
 *
 * @property integer $id
 * @property integer $invoice_id
 * @property integer $invoice_item_type_id
 * @property string $invoice_item_reference_number
 * @property string $description
 * @property integer $quantity
 * @property integer $add_vat
 * @property string $unit_price
 * @property string $subtotal
 * @property string $date_created
 * @property string $timestamp
 *
 * @property InvoiceItemType $invoiceItemType
 * @property Invoice $invoice
 */
class InvoiceItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_invoice_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['invoice_id', 'invoice_item_type_id', 'invoice_item_reference_number', 'description', 'quantity', 'unit_price', 'subtotal', 'date_created'], 'required'],
            [['invoice_id', 'invoice_item_type_id', 'quantity', 'add_vat'], 'integer'],
            [['description'], 'string'],
            [['unit_price', 'subtotal'], 'number'],
            [['date_created', 'timestamp'], 'safe'],
            [['invoice_item_reference_number'], 'string', 'max' => 50],
            [['invoice_item_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => InvoiceItemType::className(), 'targetAttribute' => ['invoice_item_type_id' => 'id']],
            [['invoice_id'], 'exist', 'skipOnError' => true, 'targetClass' => Invoice::className(), 'targetAttribute' => ['invoice_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'invoice_id' => 'Invoice ID',
            'invoice_item_type_id' => 'Invoice Item Type ID',
            'invoice_item_reference_number' => 'Invoice Item Reference Number',
            'description' => 'Description',
            'quantity' => 'Quantity',
            'add_vat' => 'Add Vat',
            'unit_price' => 'Unit Price',
            'subtotal' => 'Subtotal',
            'date_created' => 'Date Created',
            'timestamp' => 'Timestamp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoiceItemType()
    {
        return $this->hasOne(InvoiceItemType::className(), ['id' => 'invoice_item_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoice()
    {
        return $this->hasOne(Invoice::className(), ['id' => 'invoice_id']);
    }
}
