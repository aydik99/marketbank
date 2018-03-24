<?php
namespace app\models;
use yii\db\ActiveRecord;

class Docs extends ActiveRecord {
  
    public function rules()
    {
        return [
            // username and password are both required            
            //[['name_doc', 'filename'], 'required','При загрузке файла Паспорт не все поля БД получены успешно.'],
            // rememberMe must be a boolean value
            
        ];
    }
    
    public function attributeLabels() 
    {
        return [
            'name_doc'=>'Документ',
            'filename'=>'Путь к файлу',            
        ];
    }
    
    public function relations()
    {
        return [
            'user' => [self::BELONGS_TO, 'User', 'id']
        ];
    }
    
}


?>