<?php

namespace app\modules\ecom\models\forms;

use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * CreateAccountForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class CreditCardSimpleForm extends Model
{
    public $amount;
    public $email;
    public $number;
    public $exp_month;
    public $exp_year;
    public $cvc;
    public $notes;
    
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // 
            [['amount', 'number', 'exp_month', 'exp_year', 'cvc', 'email'], 'required'],
            [['zipcode', 'exp+month', 'exp_year'], 'integer'],
            [['amount'], 'number'],
            [['notes'], 'safe'],
            [['email'], 'email'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'amount' => 'Amount',
            'number' => 'Card Number',
            'exp_month' => 'Month',
            'exp_year' => 'Year',
            'cvc' => 'CVC',
            'zipcode' => 'Zipcode',
            'notes' => 'Notes',
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function process()
    {
        if (!$this->validate()) {
            return false;
        }

        return $null;
    }

    public function getMonthArray()
    {
        return [
            '01' => '01',
            '02' => '02',
            '03' => '03',
            '04' => '04',
            '05' => '05',
            '06' => '06',
            '07' => '07',
            '08' => '08',
            '09' => '09',
            '10' => '10',
            '11' => '11',
            '12' => '12',
        ];
    }

    public function getYearArray()
    {
        $a = array();
        $year = date("Y");

        for($i = 0; $i < 15; $i++) {
            $n = (string) ($year + $i);
            $a[$n] = $n;
        }
        
        return $a;
    }

}