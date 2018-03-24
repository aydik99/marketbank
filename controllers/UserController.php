<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Ask;
use app\models\Asktype;
use app\models\Docs;
use app\models\LoginForm;
use app\models\RegisterForm;
use app\models\ContactForm;
use app\models\User;
use app\models\Human;
use app\models\Status;
use app\models\UploadAvatar;
use app\models\UploadDoc;
use app\models\RequestPost;
use app\models\Sdelka;
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
        $updoc = new UploadDoc();
        $reqtype = new RequestPost();
        $docs = new Docs();
        
        
        // Принята форма методом POST
        if (Yii::$app->request->post()) {
            // проверяем что прислала форма
            switch ($_POST['RequestPost']['requestType'])
            {
                case 'avatar':
                    $upload->file = UploadedFile::getInstance($upload,'file');
                    if ($upload->validate()){
                        $path = Yii::$app->params['avaUpload'];
                        $filename = (new \DateTime())->getTimestamp() . '.' . $upload->file->extension;       
                        
                        $upload->file->saveAs($path . $filename );                
                        $human->avatar = $path . $filename;
                        if ($human->save()) {
                            \Yii::$app->getSession()->setFlash('saved',"Фото успешно загружно.");    
                        }    
                    }
                    break;
                case 'mainInfo':    
                    // сохранение данных в модель Human
                    if ($human->load(Yii::$app->request->post()) && $human->validate()){            
                        $msg = 'Данные успешно сохранены. ';
                        \Yii::$app->getSession()->setFlash('saved', $msg).
                        $human->save();
                    }
                    break;
                case 'contacts':
                    // сохранение данных в модель Human
                    if ($human->load(Yii::$app->request->post()) && $human->validate()){            
                        $msg = 'Данные успешно сохранены. ';
                        \Yii::$app->getSession()->setFlash('saved', $msg);
                        $human->save();
                    }
                    // сохранение данных в модель User
                    if ($user->load(Yii::$app->request->post()) && $user->validate()){  
                        $msg .= 'На Ваш email отправлена ссылка активации.';                        
                        $user->save();
                    }   
                    
                    if (!empty($msg))  \Yii::$app->getSession()->setFlash('saved', $msg);                    
                    break;
                case 'document':
                    switch ($_POST['RequestPost']['docType'])
                    {
                        case 'pasp':$docs->name_doc = "Паспорт"; break;
                        case 'job':$docs->name_doc = "Трудовая книжка"; break;
                        case 'income':$docs->name_doc = "Справка о доходах"; break; 
                    }
                                        
                    $updoc->file = UploadedFile::getInstance($updoc,'file');
                    if ($updoc->validate()){
                        $path = Yii::$app->params['docUpload'];
                        $filename = (new \DateTime())->getTimestamp() . '.' . $updoc->file->extension;                               
                        $updoc->file->saveAs($path . $filename );                
                        
                        $docs->id_user = $user->id;
                        $docs->filename = $path . $filename;
                        if ($docs->save()) {
                            \Yii::$app->getSession()->setFlash('saved',"$docs->name_doc успешно загружен(a).");    
                        }  
                    }
                    break;    
            
            } 
        }
        
        return Yii::$app->user->isGuest ? self::actionLogin() :  $this->render('account', 
                [
                    'human'=>$human, 
                    'user'=>$user,
                    'upload'=>$upload,
                    'updoc'=>$updoc,
                    'reqtype'=>$reqtype,
                ]);            
    }
    
    /**
     * Displays User LK.
     * @return string
     */
    public function actionLk()
    {   
        $human = Human::findOne(Yii::$app->user->identity->id);
        $ask = Ask::find()            
            ->with('asktype','askstatus')
            ->where(['id_user'=>$human->id_human, 'status'=>2])
            ->count();
        return Yii::$app->user->isGuest ? self::actionLogin() : $this->render('lk',[
            'human'=>$human,
            'ask'=>$ask,
            ]);
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
        $user = User::findOne(Yii::$app->user->identity->id);
        $ask = Ask::find()
            ->with('asktype','askstatus')
            ->where(['id_user'=>$user->id,])
            ->all();
            
        
        
        return Yii::$app->user->isGuest ? self::actionLogin() :  $this->render('credits',[
            'ask'=>$ask,
        ]);            
    }
    
    /**
     * Displays User New request for credit
     * @return string
     */
    public function actionNewrequest()
    {           
        //$ask = Human::findOne(Yii::$app->user->identity->id);
        $user = User::findOne(Yii::$app->user->identity->id);
        $ask = new Ask();
        $asktype = new Asktype();
        //$reqtype = new RequestPost();
        
                
        if ($ask->load(Yii::$app->request->post()) && $ask->validate()){            
            $ask->date_start = '19.03.2018';    
            $ask->id_user = $user->id;
            $ask->status = 1;
//            echo '<pre>';
//            print_r($ask);
//            die;
            if($ask->save()) {
                $msg = 'Заявка размещена.';
                \Yii::$app->getSession()->setFlash('message', $msg);
                return Yii::$app->response->redirect(['user/credits']);
            };
            
        }
        
        
        
        return Yii::$app->user->isGuest ? self::actionLogin() :  $this->render('newrequest',
                [
                    'user'=>$user,
                    'ask'=>$ask, 
                    'asktype'=>$asktype,
                ]);            
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
    
     public function actionSdelka()
    {         
        $user = User::findOne(Yii::$app->user->identity->id);
        $ask = Ask::find()
            ->with('asktype','askstatus')
            ->where(['id_user'=>$user->id, 'id_ask'=>$_GET['sdelka_id']])
            ->one();
         
            return Yii::$app->user->isGuest ? self::actionLogin() :  $this->render('sdelka',[
                'ask'=>$ask,
            ]);            
    }
}

?>
