<?php
namespace app\modules\ecom\components\stripe\exceptions;

class RateLimitException extends \yii\base\UserException
{
    public function getName() {
        return 'Rate Limit Exception';
    }
}