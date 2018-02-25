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

class UserController extends Controller
{
    public $layout = 'user';
    
    /**
     * Displays User profile.     
     * @return string
     */
    public function actionAccount()
    {           
        $human = Human::findOne(Yii::$app->user->identity->id);
    
        return Yii::$app->user->isGuest ? self::actionLogin() :  $this->render('account', ['human'=>$human]);            
    }
    
    /**
     * Displays User LK.
     * @return string
     */
    public function actionLk()
    {   
        $human = Human::findOne(Yii::$app->user->identity->id);
        return Yii::$app->user->isGuest ? self::actionLogin() : $this->render('lk',['human'=>$human]);
    }
    
    /**
     * Redirect to main login page
     */
    public function actionLogin(){
           return Yii::$app->response->redirect(['site/login']);
    }
    
    /**
     * Displays User Credits.
     * @return string
     */
    public function actionCredits()
    {   
            return Yii::$app->user->isGuest ? self::actionLogin() :  $this->render('credits');            
    }
    
    /**
     * Displays User New request for credit
     * @return string
     */
    public function actionNewrequest()
    {           
            return Yii::$app->user->isGuest ? self::actionLogin() :  $this->render('newrequest');            
    }
    
    /**
     * Displays User messages
     * @return string
     */
    public function actionMessages()
    {           
            return Yii::$app->user->isGuest ? self::actionLogin() :  $this->render('messages');            
    }
    
    /**
     * Displays User alerts
     * @return string
     */
    public function actionAlerts()
    {           
            return Yii::$app->user->isGuest ? self::actionLogin() :  $this->render('alerts');            
    }

    /**
     * Displays User notification
     * @return string
     */
    public function actionNotification()
    {           
            return Yii::$app->user->isGuest ? self::actionLogin() :  $this->render('notification');            
    }
    
    
}

?>