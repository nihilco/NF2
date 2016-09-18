<?php

namespace app\modules\tatetownship\controllers;

use yii\web\Controller;

/**
 * Default controller for the `tatetownship` module
 */
class GovernmentController extends Controller
{
    public $layout = '@app/modules/core/views/layouts/page';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionMinutes()
    {
        return $this->render('minutes');
    }

    public function actionTrustees()
    {
        return $this->render('trustees');
    }

    public function actionJobs()
    {
        return $this->render('jobs');
    }
}
