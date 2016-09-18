<?php
namespace app\modules\ecom\components\stripe\exceptions;

class InvalidRequestException extends \yii\base\UserException
{
    public function getName() {
        return 'Invalid Request Exception';
    }
}