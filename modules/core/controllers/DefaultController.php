<?php

namespace app\modules\core\controllers;

use yii\web\Controller;

/**
 * Default controller for the `core` module
 */
class DefaultController extends Controller
{
    public $layout = 'main';

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionMaintenance()
    {
        $layout = 'blank';
        return $this->render('maintenance');
    }
}
