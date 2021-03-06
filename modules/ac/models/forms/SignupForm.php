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
            ['birthday', 'date', 'format' => 'php:m/d/Y'],
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

        if(!$user->save()) {
            return null;
        }

        // the following three lines were added:
        $auth = \Yii::$app->authManager;
        $userRole = $auth->getRole('User');
        $auth->assign($userRole, $user->getId());
        $uidRole = $auth->createRole('User' . $user->getId());
        $uidRole->description = "Role for " . $this->email . ".";
        $auth->add($uidRole);
        $auth->assign($uidRole, $user->getId());

        // Send email
        $this->sendEmail();
        
        return $user;
    }

    public function sendEmail()
    {
        return \Yii::$app->mail->compose([
            'html' => '@app/modules/ac/views/emails/signup/html',
            'text' => '@app/modules/ac/views/emails/signup/text'],
        [
            'email' => $this->email,
            'nickname' => $this->nickname,
            'birthday' => $this->birthday
        ])
                ->setFrom(['no-reply@nihil.co' => 'The NIHIL Corporation'])
                ->setTo([$this->email => $this->nickname])
                ->setSubject('Welcome to the NIHIL Framework!')
                ->send();
    }
    
}