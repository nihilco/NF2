<?php

namespace app\modules\core\controllers;

use Yii;
use yii\base\Action;
use yii\base\Exception;
use yii\base\UserException;

class ErrorsController extends \yii\web\Controller
{
    public $layout = 'blank';

    public function actionError()
    {
        if (($exception = Yii::$app->getErrorHandler()->exception) === null) {
            // action has been invoked not from error handler, but by direct route, so we display '404 Not Found'
            $exception = new HttpException(404, 'Page not found.');
        }

        if ($exception instanceof HttpException) {
            $code = $exception->statusCode;
        } else {
            $code = $exception->getCode();
        }
        if ($exception instanceof Exception) {
            $name = $exception->getName();
        } else {
            $name = $this->defaultName ?: 'Error';
        }
        if ($code) {
            $name .= " (#$code)";
        }

        if ($exception instanceof UserException) {
            $message = $exception->getMessage();
        } else {
            $message = $this->defaultMessage ?: 'An internal server error occurred.';
        }
        
        if($exception->statusCode == 404) {
            $v = '404';
        }elseif($exception->statusCode == 500) {
            $v = '500';
        }else{
            $v = 'error';
        }
        
        if (Yii::$app->getRequest()->getIsAjax()) {
            return "$name: $message";
        } else {
            return $this->render($v, [
                'name' => $name,
                'message' => $message,
                'exception' => $exception,
            ]);
        }
    }
}
