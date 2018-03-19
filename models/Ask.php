<?php
namespace app\models;
use yii\db\ActiveRecord;

class Ask extends ActiveRecord {
  
    public function rules()
    {
        return [
            // username and password are both required            
            [['summa'], 'required','message'=>'Это обязательное поле.'],
            // rememberMe must be a boolean value
            [['date_start','comment','filename','date_start','id_type'], 'safe'],            
        ];
    }
    
    public function attributeLabels() 
    {
        return [
            'id_type'=>'Вид',
            'summa'=>'Сумма',            
            'comment'=>'Пояснение',
            'filename'=>'Прикрепить файл',
        ];
    }
    
    
    public function getAsktype(){
        return $this->hasOne(Asktype::className(),['id_type'=>'id_type']);
    }
    
    public function getAskstatus(){
        return $this->hasOne(Askstatus::className(),['id_status'=>'status']);
    }
    
        
}


?>