<?php

namespace app\modules\ac\controllers;

use yii\web\Controller;

/**
 * Default controller for the `ac` module
 */
class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['ac.default.index'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['invite'],
                        'roles' => ['ac.default.invite'],
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

    public function actionInvite()
    {
        $reps = [
            1 => [
                'name' => 'Matt Clemmer',
                'email' => 'mclemmer@gmail.com',
                'organization' => 'The NIHIL Corporation',
            ],
            2 => [
                'name' => 'Ann K. Taylor',
                'email' => 'ataylor@baylorschool.org',
                'organization' => 'Baylor School',
            ],
        ];

        $c = 0;

        foreach($reps as $rep) {

            \Yii::$app->ctccf->compose([
                'html' => '@app/modules/ac/views/emails/invitation/html',
                'text' => '@app/modules/ac/views/emails/invitation/text'],
                [
                    'email' => $rep['email'],
                    'name' => $rep['name'],
                    'organization' => $rep['organization'],
                ])
                ->setFrom(['no-reply@coasttocoastcollegefair.com' => 'Coast to Coast College Fair'])
                ->setTo([$rep['email'] => $rep['name']])
                ->setSubject('Invitation to Coast to Coast College Fair')
                ->send();

            $c++;
        }
        
        return $this->render('invite', [
            'count' => $c,
        ]);
    }
}
