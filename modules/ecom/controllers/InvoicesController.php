<?php

namespace app\modules\ecom\controllers;

use Yii;
use app\modules\ecom\models\Invoice;
use app\modules\ecom\models\search\InvoiceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\ecom\models\forms\PayInvoiceForm;

/**
 * InvoicesController implements the CRUD actions for Invoice model.
 */
class InvoicesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['ecom.invoices.index'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['ecom.invoices.create'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['ecom.invoices.view'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['details'],
                        'roles' => ['ecom.invoices.details'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['ecom.invoices.update'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['ecom.invoices.delete'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['list'],
                        'roles' => ['ecom.invoices.list'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['pay'],
                        'roles' => ['ecom.invoices.pay'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'pay' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        //if ($action->id == 'pay') {
        //    $this->enableCsrfValidation = false;
        //}

        return parent::beforeAction($action);
    }

    /**
     * Index action
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Displays a single Invoice model.
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
     * Displays a single Invoice model.
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
     * Creates a new Invoice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Invoice();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Invoice model.
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
     * Deletes an existing Invoice model.
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
     * Lists all Invoice models.
     * @return mixed
     */
    public function actionList()
    {
        $searchModel = new InvoiceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Pays a Invoice.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionPay()
    {
        //$post = \Yii::$app->request->post();
        $model = new PayInvoiceForm();
        //$model->stripe_token = $post['stripe_token'];
        //$model->invoice_id = $post['invoice_id'];
        //$model->notes = $post['notes'];
        
        if ($model->load(Yii::$app->request->post()) && $model->process()) {
            return $this->redirect(['view', 'id' => $model->invoice_id]);
        } else {
            die(print_r($model));
        }
    }
    
    /**
     * Finds the Invoice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Invoice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if(is_numeric($id)) {
            if (($model = Invoice::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        } else {
            if (($model = Invoice::find()->where(['auth_key' => $id])->one()) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }

    }
}
