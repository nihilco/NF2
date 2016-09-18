<?php

namespace app\modules\ecom\models;

use Yii;

/**
 * This is the model class for table "ecom_invoice_statuses".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $color
 * @property string $date_created
 * @property string $timestamp
 *
 * @property Invoice[] $invoices
 */
class InvoiceStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_invoice_statuses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'date_created'], 'required'],
            [['description'], 'string'],
            [['color', 'date_created', 'timestamp'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['color'], 'string', 'max' => 7],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'color' => 'Color',
            'date_created' => 'Date Created',
            'timestamp' => 'Timestamp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices()
    {
        return $this->hasMany(Invoice::className(), ['invoice_status_id' => 'id']);
    }
}
