<?php

namespace app\modules\ecom\models\forms;

use yii\base\Model;
use app\modules\ecom\models\Account;
use app\modules\ac\models\User;
use app\modules\core\models\Country;
use yii\helpers\ArrayHelper;

/**
 * CreateAccountForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class CreateAccountForm extends Model
{
    public $accountType = 'individual';

    public $user_id;
    
    public $businessName;
    public $businessTaxId;

    public $firstname;
    public $lastname;
    public $dob;
    public $ssn;
    public $address1;
    public $address2;
    public $city;
    public $state;
    public $postalCode;
    public $country_id;
    
    public $tosAccept;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // 
            [['accountType', 'user_id', 'firstname', 'lastname', 'dob', 'ssn', 'address1', 'city', 'state', 'postalCode', 'country_id', 'tosAccept'], 'required'],
            ['tosAccept', 'boolean', 'trueValue' => true, 'falseValue' => false],
            [['user_id', 'country_id'], 'integer'],
            ['accountType', 'in', 'range' => ['individual' ,'business']],
            ['ssn', 'string', 'min' => 9, 'max' => 9],
            ['postalCode', 'string', 'min' => 5, 'max' => 5],
            ['dob', 'date', 'format' => 'php:m/d/Y'],
            [['businessName', 'businessTaxId'], 'required', 'when' => function ($model) {
                    return $model->accountType == 'business';
                }, 'whenClient' => "function (attribute, value) {
              return $('#accountType').val() == 'business';
            }"],
        ];
    }

    public function attributeLabels()
    {
        return [
            'accountType' => 'Account Type',
            'user_id' => 'User',
            'businessName' => 'Business Name',
            'businessTaxId' => 'Business Tax ID',
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'dob' => 'Date of Birth',
            'ssn' => 'SSN',
            'address1' => 'Address1',
            'address2' => 'Address2',
            'city' => 'City',
            'state' => 'State',
            'postal_code' => 'Postal Code',
            'country_id' => 'County',
            'tosAccept' => 'Terms of Service Agreement',
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function create()
    {
        if (!$this->validate()) {
            return false;
        }

        $user = User::find()->where(['id' => $this->user_id])->one();
        $country = Country::find()->where(['id' => $this->country_id])->one();

        $sa = \Yii::$app->stripe->account->createAccount($user->email, $country->code, true);

        echo "<code>";
        print_r($sa);
        echo "</code>";
        
        $account = new Account();
        $account->account_status_id = 4; // Add a db call instead of static value
        $account->user_id = $this->user_id;
        $account->stripe_account_id = $sa->id;
        $account->secret_key = $sa->keys['secret'];
        $account->publishable_key = $sa->keys['publishable'];
        $account->mode = \Yii::$app->stripe->mode;
        
        if(!$account->save()) {
            return null;
        }

        if($this->accountType == 'business') {
            $sa->legal_entity->business_name = $this->businessName;
            $sa->legal_entity->business_tax_id = $this->businessTaxId;
        }

        $sa->legal_entity->type = $this->accountType;
        
        $sa->legal_entity->first_name = $this->firstname;
        $sa->legal_entity->last_name = $this->lastname;
        $sa->legal_entity->dob->day = date("d", strtotime($this->dob));
        $sa->legal_entity->dob->month = date("m", strtotime($this->dob));
        $sa->legal_entity->dob->year = date("Y", strtotime($this->dob));
        $sa->legal_entity->personal_id_number = $this->ssn;
        $sa->legal_entity->address->line1 = $this->address1;
        $sa->legal_entity->address->line2 = $this->address2;
        $sa->legal_entity->address->city = $this->city;
        $sa->legal_entity->address->state = $this->state;
        $sa->legal_entity->address->postal_code = $this->postalCode;
        
        $sa->tos_acceptance->date = time();
        $sa->tos_acceptance->ip = \Yii::$app->request->userIp;
        $sa->tos_acceptance->user_agent = \Yii::$app->request->userAgent;

        $sa->save();

        echo "<code>";
        print_r($sa);
        echo "</code>";        
        
        return $this;
    }

    public function getCountryArray()
    {
        return ArrayHelper::map(Country::find()->all(), 'id', 'code');
    }

    public function getUserArray()
    {
        return ArrayHelper::map(User::find()->all(), 'id', 'email');
    }

    public function getAccountId()
    {
        if($this->_account) {
            return $this->_account->id;
        }

        return null;
    }

}