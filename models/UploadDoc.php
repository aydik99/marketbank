<?php

namespace app\models;

use Yii;
use yii\base\Model;

class UploadDoc extends Model {
        
    public $file;
    
    public function rules() {
        return [
            [['file'], 'file', 'extensions'=>'png, jpg, bmp, pdf', 'skipOnEmpty'=>false]
        ];
    }
    
    public function attributeLabels() 
    {
        return [
            'file'=>'Загрузить',                      
        ];
    }
    
    
}

?>