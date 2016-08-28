<?php

namespace app\modules\ac\models\forms;

use yii\base\Model;
use app\modules\ac\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $email;
    public $password;
    public $password_repeat;
    public $nickname;
    public $birthday;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'nickname', 'password', 'password_repeat', 'birthday'], 'required'],
            ['email', 'string', 'min' => 3, 'max' => 150],
            ['email', 'trim'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\app\modules\ac\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'string', 'min' => 6],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $customer = \Yii::$app->stripe->customer->createCustomer($this->email, 'Customer for ' . $this->email . '.', array('birthday' => $this->birthday));

        $user = new User();
        $user->email = $this->email;
        $user->nickname = $this->nickname;
        $user->setPassword($this->password);
        $user->stripe_customer_id = $customer->id;
        return $user->save() ? $user : null;
    }
}