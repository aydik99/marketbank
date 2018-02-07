<?php 
namespace app\models;
use yii\base\Model;

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
            ['username','unique','targetClass' => User::className(), 'message' => 'Этот логин уже занят'],
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
}
    
    
    
?>