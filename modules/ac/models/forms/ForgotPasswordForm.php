<?php
namespace app\modules\ac\models\forms;

use Yii;
use yii\base\Model;
use app\modules\ac\models\User;

/**
 * Password reset request form
 */
class ForgotPasswordForm extends Model
{
    public $email;

    /**
     * @inheritdoc
     */
    public function rules()
    {
                return [
                    ['email', 'trim'],
                    ['email', 'required'],
                    ['email', 'email'],
                    ['email', 'exist',
                      'targetClass' => '\app\modules\ac\models\User',
                      'message' => 'There is no user with such email.'
                    ],
                ];
    }
    
    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function sendEmail()
    {
        /* @var $user User */

        if (!$user = User::findOne(['email' => $this->email])) {
            return false;
        }

        //if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
        //    $user->generatePasswordResetToken();
        //    if (!$user->save()) {
        //        return false;
        //    }
        //}
        return Yii::$app->mailer->compose([
            'html' => 'passwordResetToken-html',
            'text' => 'passwordResetToken-text'],
            ['user' => $user]
        )
         ->setFrom(['no-reply@nihilframework.com' => 'No-Reply | NIHIL'])
         ->setTo($this->email)
         ->setSubject('Password reset for ' . Yii::$app->name)
         ->send();
    }
}