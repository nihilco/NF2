<?php

namespace app\modules\tatetownship\controllers;

use yii\web\Controller;

/**
 * Default controller for the `tatetownship` module
 */
class DefaultController extends Controller
{
    public $layout = '@app/modules/core/views/layouts/page';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
