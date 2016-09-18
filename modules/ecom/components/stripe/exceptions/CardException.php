<?php
namespace app\modules\ecom\components\stripe\exceptions;

class CardException extends \yii\base\UserException
{
    public function getName()
    {
        return 'Card Exception';
    }
}