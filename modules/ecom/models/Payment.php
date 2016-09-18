<?php

namespace app\modules\ecom\models;

use Yii;
use app\modules\ac\models\User;

/**
 * This is the model class for table "ecom_payments".
 *
 * @property integer $id
 * @property integer $payment_type_id
 * @property integer $invoice_id
 * @property integer $user_id
 * @property integer $anonymous
 * @property string $amount
 * @property string $reference_number
 * @property string $notes
 * @property string $date_created
 * @property string $timestamp
 *
 * @property PaymentType $paymentType
 * @property Invoice $invoice
 * @property User $user
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_payments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payment_type_id', 'invoice_id', 'user_id', 'amount'], 'required'],
            [['payment_type_id', 'invoice_id', 'user_id', 'anonymous'], 'integer'],
            [['amount'], 'number'],
            [['notes'], 'string'],
            [['reference_number', 'date_created', 'timestamp'], 'safe'],
            [['reference_number'], 'string', 'max' => 128],
            [['payment_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PaymentType::className(), 'targetAttribute' => ['payment_type_id' => 'id']],
            [['invoice_id'], 'exist', 'skipOnError' => true, 'targetClass' => Invoice::className(), 'targetAttribute' => ['invoice_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payment_type_id' => 'Payment Type ID',
            'invoice_id' => 'Invoice ID',
            'user_id' => 'User ID',
            'anonymous' => 'Anonymous',
            'amount' => 'Amount',
            'reference_number' => 'Reference Number',
            'notes' => 'Notes',
            'date_created' => 'Date Created',
            'timestamp' => 'Timestamp',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->date_created = date("Y-m-d H:i:s");
            }
            return true;
        }
        return false;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentType()
    {
        return $this->hasOne(PaymentType::className(), ['id' => 'payment_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoice()
    {
        return $this->hasOne(Invoice::className(), ['id' => 'invoice_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
