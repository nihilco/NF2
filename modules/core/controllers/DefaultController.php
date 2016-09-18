<?php

namespace app\modules\core\controllers;

use yii\web\Controller;
use app\modules\core\models\forms\ContactForm;

/**
 * Default controller for the `core` module
 */
class DefaultController extends Controller
{
    public $layout = 'main';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['core.default.index'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['maintenance'],
                        'roles' => ['core.default.maintenance'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['contact'],
                        'roles' => ['core.default.contact'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['settings'],
                        'roles' => ['core.default.settings'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['captcha'],
                        'roles' => ['core.default.captcha'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionMaintenance()
    {
        $layout = 'blank';
        return $this->render('maintenance');
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(\Yii::$app->request->post()) && $model->contact()) {
            \Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        }
        
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionSettings()
    {
        $layout = 'main';
                
        return $this->render('settings');
    }
}
