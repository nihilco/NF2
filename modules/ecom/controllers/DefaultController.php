<?php

namespace app\modules\ecom\controllers;

use yii\web\Controller;
use yii\web\HttpException;
use app\modules\ecom\components\stripe\exceptions\BaseException;

/**
 * Default controller for the `ecom` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
