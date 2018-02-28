<?php

namespace app\models;

use Yii;
use yii\base\Model;

class UploadAvatar extends Model {
        
    public $file;
    
    public function rules() {
        return [
            [['file'], 'file', 'extensions'=>'png, jpg, bmp', 'skipOnEmpty'=>false]
        ];
    }
    
    public function attributeLabels() 
    {
        return [
            'file'=>'Загрузить фото',                      
        ];
    }
    
    
}

?>