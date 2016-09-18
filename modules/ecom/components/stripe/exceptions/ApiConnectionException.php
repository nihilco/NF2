<?php
namespace app\modules\ecom\components\stripe\exceptions;

class ApiConnectionException extends \yii\base\UserException
{
    public function getName() {
        return 'API Connection Exception';
    }
}