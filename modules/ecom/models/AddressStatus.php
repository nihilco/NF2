<?php

namespace app\modules\ecom\models;

use Yii;

/**
 * This is the model class for table "ecom_address_statuses".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $description
 * @property string $date_created
 * @property string $timestamp
 *
 * @property Address[] $addresses
 */
class AddressStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_address_statuses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name', 'description', 'date_created'], 'required'],
            [['description'], 'string'],
            [['date_created', 'timestamp'], 'safe'],
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
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'description' => 'Description',
            'date_created' => 'Date Created',
            'timestamp' => 'Timestamp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEcomAddresses()
    {
        return $this->hasMany(Address::className(), ['address_status_id' => 'id']);
    }
}
