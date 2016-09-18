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
    public $user_id;
    public $country_id;
    public $managed = true;

    public $_account;
    
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // 
            [['user_id', 'country_id', 'managed'], 'required'],
            ['managed', 'boolean', 'trueValue' => true, 'falseValue' => false],
            [['user_id', 'country_id'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'user_id' => 'User',
            'country_id' => 'Country',
            'managed' => 'Managed',
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

        $sa = \Yii::$app->stripe->account->createAccount($user->email, $country->code, $this->managed);

        $this->_account = new Account();
        $this->_account->account_status_id = 4; // Add a db call instead of static value
        $this->_account->user_id = $this->user_id;
        $this->_account->stripe_account_id = $sa->id;
        $this->_account->secret_key = $sa->keys['secret'];
        $this->_account->publishable_key = $sa->keys['publishable'];
        
        if(!$this->_account->save()) {
            return null;
        }

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