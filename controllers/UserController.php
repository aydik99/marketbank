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

class UserController extends Controller
{
    public $layout = 'user';
    
    /**
     * Displays User profile.
     *
     * @return string
     */
    public function actionAccount()
    {   
        if (Yii::$app->user->isGuest) {
            return Yii::$app->response->redirect(['site/login']);
        } else {
            return $this->render('account');    
        }        
    }
    
    /**
     * Displays User LK.
     *
     * @return string
     */
    public function actionLk()
    {   
        if (Yii::$app->user->isGuest) {
            return Yii::$app->response->redirect(['site/login']);
        } else {
            return $this->render('lk');    
        }        
    }
    
    /**
     * Redirect to main login page
     */
    public function actionLogin(){
           return Yii::$app->response->redirect(['site/login']);
    }
    
    
}

?>