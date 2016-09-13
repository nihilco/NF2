<?php

namespace app\modules\ecom\models;

use Yii;

/**
 * This is the model class for table "ecom_currencies".
 *
 * @property integer $id
 * @property string $symbol
 * @property string $abbr
 * @property string $name
 * @property string $description
 * @property string $date_created
 * @property string $timestamp
 *
 * @property Invoice[] $invoices
 */
class Currency extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_currencies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['symbol', 'abbr', 'name', 'description', 'date_created'], 'required'],
            [['description'], 'string'],
            [['date_created', 'timestamp'], 'safe'],
            [['symbol'], 'string', 'max' => 1],
            [['abbr'], 'string', 'max' => 5],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'symbol' => 'Symbol',
            'abbr' => 'Abbr',
            'name' => 'Name',
            'description' => 'Description',
            'date_created' => 'Date Created',
            'timestamp' => 'Timestamp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices()
    {
        return $this->hasMany(Invoice::className(), ['currency_id' => 'id']);
    }
}
