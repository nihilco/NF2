<?php

namespace app\modules\ac\controllers;

use Yii;
use app\modules\ac\models\User;
use app\modules\ac\models\search\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\ac\models\forms\LoginForm;
use app\modules\ac\models\forms\SignupForm;
use app\modules\ac\models\forms\ForgotPasswordForm;
use app\modules\ac\models\forms\ResetPasswordForm;

/**
 * UsersController implements the CRUD actions for User model.
 */
class UsersController extends Controller
{
    public $layout;
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionDetails($id)
    {
        return $this->render('details', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionList()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $this->layout = '@app/modules/core/views/layouts/blank';
        
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $model = new LoginForm();

        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        \Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $this->layout = '@app/modules/core/views/layouts/blank';
        
        $model = new SignupForm();

        if ($model->load(\Yii::$app->request->post())) {
            
            if ($user = $model->signup()) {

                if (\Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionForgotPassword()
    {
        $this->layout = '@app/modules/core/views/layouts/blank';
        
        $model = new ForgotPasswordForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }
        return $this->render('forgot-password', [
            'model' => $model,
        ]);
    }
    
    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');
            return $this->goHome();
        }
        return $this->render('reset-password', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
