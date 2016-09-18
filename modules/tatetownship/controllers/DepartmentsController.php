<?php

namespace app\modules\tatetownship\controllers;

use yii\web\Controller;

/**
 * Default controller for the `tatetownship` module
 */
class DepartmentsController extends Controller
{
    public $layout = '@app/modules/core/views/layouts/page';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionMaintenance()
    {
        return $this->render('maintenance');
    }

    public function actionZoning()
    {
        return $this->render('zoning');
    }

    public function actionFd()
    {
        return $this->render('fd');
    }

    public function actionDeputy()
    {
        return $this->render('deputy');
    }
}
