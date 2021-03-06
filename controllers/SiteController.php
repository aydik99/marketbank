<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\RegisterForm;
use app\models\ContactForm;
use app\models\User;
use app\models\Human;

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
        if (Yii::$app->user->isGuest) {
            return Yii::$app->response->redirect(['site/login']);
        } else {
            return Yii::$app->response->redirect(['user/lk']);
        }        
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return Yii::$app->response->redirect(['user/lk']);
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
        return Yii::$app->response->redirect(['user/login']);
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        if (Yii::$app->user->isGuest) {
            return Yii::$app->response->redirect(['site/login']);
        }
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        if (Yii::$app->user->isGuest) {
            return Yii::$app->response->redirect(['site/login']);
        }
        return $this->render('about');
    }
    
    /**
     * Displays register page.
     *
     * @return string
     */
    public function actionRegister()
    {        
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RegisterForm();        
        $key = (new \DateTime())->getTimestamp();         
         
            
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->mailActivation(Yii::$app->params['adminEmail'], $key) ) 
        // if ($model->load(Yii::$app->request->post()) && $model->validate() )
        {
            $user = new User();
            $user->username = $model->username;            
            $user->email = $model->email;      
            $user->confirmed = 0;                        
            $user->activation_key = $key;
            $user->password = Yii::$app->security->generatePasswordHash($model->password);
            
            if ($user->save())
            {
                $human = new Human();
                $human->id_human = $user->id;
                $human->lastname = $model->lastname;
                $human->firstname = $model->firstname;
                $human->fathername = $model->fathername;
                $human->datebirth = $model->datebirth;
                
                if ($human->save()) {
                    \Yii::$app->getSession()->setFlash('needConfirm','На Ваш email отправлена ссылка активации.');
                    return $this->goHome();    
                }    
            }
        }
        
        return $this->render('register', [
            'model' => $model,
        ]);
    }
    
    
    public function actionActivate()
    {       
        $user = User::find()->where(['email'=>$_GET['mail']])->one();
        if ($user->activation_key == $_GET['key']) {            
            $user->confirmed = 1;
            $user->save();            
            return $this->render('activate',['good_key'=>true]);
        }
        return $this->render('activate',['good_key'=>false]);
    }
    
}
