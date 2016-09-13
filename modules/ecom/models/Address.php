<?php

namespace app\modules\ecom\models;

use Yii;
use app\modules\ac\models\User;

/**
 * This is the model class for table "ecom_addresses".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $address_status_id
 * @property string $postal_code
 * @property string $date_created
 * @property string $date_updated
 * @property string $timestamp
 *
 * @property AddressStatus $addressStatus
 * @property User $user
 * @property Invoice[] $invoices
 */
class Address extends \yii\db\ActiveRecord
{
    //
    private $_physical_billing_address;
    private $_physical_shipping_address;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_addresses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'address_status_id', 'postal_code', 'date_created'], 'required'],
            [['user_id', 'address_status_id'], 'integer'],
            [['date_created', 'date_updated', 'timestamp'], 'safe'],
            [['postal_code'], 'string', 'max' => 16],
            [['address_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => AddressStatus::className(), 'targetAttribute' => ['address_status_id' => 'id']],
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
            'user_id' => 'User ID',
            'address_status_id' => 'Address Status ID',
            'postal_code' => 'Postal Code',
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
            'timestamp' => 'Timestamp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddressStatus()
    {
        return $this->hasOne(AddressStatus::className(), ['id' => 'address_status_id']);
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
    public function getInvoices()
    {
        return $this->hasMany(Invoices::className(), ['billing_address_id' => 'id']);
    }

    //
    public function getPhysicalBillingAddress()
    {
        if(!$this->_physical_billing_address) {
            $customer = \Yii::$app->stripe->customer->getCustomer($this->user->stripe_customer_id);
            $addresses = unserialize($customer->metadata['addresses']);
            $this->_physical_billing_address = $addresses[$this->id];
        }

        return $this->_physical_billing_address;
    }

    //
    public function getPhysicalShippingAddress()
    {
        if(!$this->_physical_shipping_address) {
            $customer = \Yii::$app->stripe->customer->getCustomer($this->user->stripe_customer_id);
            $addresses = unserialize($customer->metadata['addresses']);
            $this->_physical_shipping_address = $addresses[$this->id];
        }

        return $this->_physical_shipping_address;
    }

}

class PhysicalAddress
{
    public $name;
    public $organization;
    public $address1;
    public $address2;
    public $city;
    public $state;
    public $postal_code;
    public $country;

    public function __construct()
    {
        $this->name = 'Uriah M. Clemmer IV';
        $this->organization = 'The NIHIL Corporation';
        $this->address1 = '6409 Sail Pointe Lane';
        $this->city = 'Hixson';
        $this->state = 'TN';
        $this->postal_code = '37343';
        $this->country = "USA";
    }
}