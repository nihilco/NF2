<?php
namespace app\modules\ecom\components\stripe\exceptions;

class AuthenticationException extends \yii\base\UserException
{
    public function getName() {
        return 'Authentication Exception';
    }
}