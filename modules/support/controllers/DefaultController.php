<?php

namespace app\modules\support\controllers;

use yii\web\Controller;

/**
 * Default controller for the `support` module
 */
class DefaultController extends Controller
{
    public $layout = '@app/modules/core/views/layouts/admin';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['support.default.index'],
                    ],
                ],
            ],
        ];
    }
    
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
