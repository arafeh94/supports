<?php

namespace app\controllers;

use app\models\forms\LoginForm;
use app\models\forms\PaymentSearchForm;
use app\models\forms\SupportForm;
use app\models\Payment;
use app\models\SupList;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\filters\AccessControl;
use yii\grid\ActionColumn;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * @return string
     */
    public function actionNew()
    {
        $model = new SupList();
        $request = Yii::$app->request->post();
        if ($request) {
            $model->load($request);
            if ($model->validate()) {
                $model->save();
                $this->redirect(['status', 'new' => $model->id]);
            }
        }
        return $this->render('new', ['model' => $model]);
    }

    /**
     * @return string
     */
    public function actionStatus()
    {
        return $this->render('status');
    }

    /**
     * @param null $id
     * @param bool $update
     * @return string
     */
    public function actionPayment($id = null, $update = false)
    {
        $model = new Payment();
        if ($id != null && $update) {
            $model = Payment::findOne($id);
        }
        $request = Yii::$app->request->post();
        $saved = null;
        if ($model->load($request)) {
            if ($model->validate()) {
                $model->save();
                $saved = true;
                $model = new Payment();
            }
        }
        return $this->render('payment', ['model' => $model, 'saved' => $saved]);
    }

    /**
     * @return string
     */
    public function actionView()
    {
        $provider = new ActiveDataProvider(['query' => SupList::find()]);
        $searchModel = new PaymentSearchForm();
        $request = Yii::$app->request->post();
        if ($searchModel->load($request)) {
            $query = Suplist::find();
            if ($searchModel->firstName) $query->where(['like', 'firstName', "$searchModel->firstName"]);
            if ($searchModel->lastName) $query->orWhere(['like', 'lastName', "$searchModel->lastName"]);
            if ($searchModel->fatherName) $query->orWhere(['like', 'fatherName', "$searchModel->fatherName"]);
            if ($searchModel->idNumber) $query->orWhere(['=', 'idNumber', "{$searchModel->idNumber}"]);
            $provider = new ActiveDataProvider(['query' => $query]);
        }
        return $this->render('view', ['provider' => $provider, 'search' => $searchModel]);
    }
}
