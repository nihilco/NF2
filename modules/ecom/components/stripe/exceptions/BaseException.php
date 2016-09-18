<?php
namespace app\modules\ecom\components\stripe\exceptions;

class BaseException extends \yii\base\UserException
{
    public function getName() {
        return 'Base Exception';
    }
}