<?php
namespace app\models;
use yii\db\ActiveRecord;
use app\models\User;


class Human extends ActiveRecord {
  
    public function rules()
    {
        return [
            // username and password are both required            
            [['lastname', 'firstname','fathername'], 'required','message'=>'Это обязательное поле.'],
            // rememberMe must be a boolean value
            [['datebirth','tel'], 'safe'],            
        ];
    }
    
    public function attributeLabels() 
    {
        return [
            'lastname'=>'Фамилия',
            'firstname'=>'Имя',            
            'fathername'=>'Отчество',
            'email'=>'e-mail',
            'tel'=>'Телефон',
            'datebirth' => 'Дата рождения',
                      
        ];
    }
    
}


?>