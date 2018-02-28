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
use app\models\UploadAvatar;
use yii\web\UploadedFile;

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
        $user = User::findOne(Yii::$app->user->identity->id);
        $upload = new UploadAvatar();
        
        
        // Загрузка Аватарки
        if (Yii::$app->request->post()) {
            $upload->file = UploadedFile::getInstance($upload,'file');
            if ($upload->validate()){
                $path = Yii::$app->params['avaUpload'];
                $filename = $key = (new \DateTime())->getTimestamp() . '.' . $upload->file->extension;         
                $upload->file->saveAs($path . $filename );                
                $human->avatar = $path . $filename;
                if ($human->save()) {
                    \Yii::$app->getSession()->setFlash('saved','Фото успешно загружено.');    
                }                
            }            
        }
        
        // сохранение данных в модель Human
        if ($human->load(Yii::$app->request->post()) && $human->validate()){            
            \Yii::$app->getSession()->setFlash('saved','Данные успешно сохранены.').
            $human->save();
        }
        
        // сохранение данных в модель User
        if ($user->load(Yii::$app->request->post()) && $user->validate()){  
            \Yii::$app->getSession()->setFlash('saved','На Ваш email отправлена ссылка активации.').
            $user->save();
        }
    
        return Yii::$app->user->isGuest ? self::actionLogin() :  $this->render('account', 
                [
                    'human'=>$human, 
                    'user'=>$user,
                    'upload'=>$upload
                ]);            
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