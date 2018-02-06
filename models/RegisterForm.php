<?php 
namespace app\models;
use yii\base\Model;

class RegisterForm extends Model 
{
    public $username;
    public $password;
    
    
    public function rules()
    {
        return [
          [['username','password'],'required','message'=>'Это обязательное поле.'],
            ['username','unique','targetClass' => User::className(), 'message' => 'Этот логин уже занят'],
        ];    
    }
    
    public function attributeLabels() 
    {
        return [
            'username'=>'Логин',
            'password'=>'Пароль'
        ];
    }
}
    
    
    
?>