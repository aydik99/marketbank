<?php 
namespace app\models;
use yii\base\Model;
use app\models\User;
use Yii;

class RegisterForm extends Model 
{
    public $lastname;
    public $firstname;    
    public $fathername;
    public $email;
    public $datebirth;
    public $username;
    public $password;
    public $password_again;
    
    public function rules()
    {
        return [
          [['lastname','firstname','fathername','email','datebirth', 'username','password', 'password_again' ],'required','message'=>'Это обязательное поле.'],
            ['password_again','compare','compareAttribute'=>'password','message'=>'Введенные пароли не совпадают.'],
            ['username','unique','targetClass' => User::className(), 'message' => 'Этот логин уже занят.'],
            ['email','unique','targetClass' => User::className(), 'message' => 'Этот e-mail уже используется.'],        
            ['email', 'email','message' => 'Введите корректный e-mail адрес'],
        ];    
    }
    
    public function attributeLabels() 
    {
        return [
            'username'=>'Логин',
            'password'=>'Пароль',
            'lastname'=>'Фамилия',
            'firstname'=>'Имя',            
            'fathername'=>'Отчество',
            'email'=>'e-mail',
            'datebirth' => 'Дата рождения',
            'password_again'=>'Повторите пароль',            
        ];
    }
    
    
    public function mailActivation($email,$key)
    {
        if ($this->validate()) {
            $mailTxt = "Для активации аккаунта перейдите по ссылке: http://marketbank.ru/site/activate?mail=$this->email&key=$key";
            $mailTxt = mb_convert_encoding($mailTxt, 'utf-8', mb_detect_encoding($mailTxt));
            Yii::$app->mailer->compose()
                ->setTo($this->email)
                ->setFrom($email)
                ->setSubject('email activation')
                ->setTextBody($mailTxt)
                ->send();

            return true;
        }
        return false;
    }
}
    
    
    
?>