<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'lastname')->textInput(['autofocus' => true, 'placeholder'=>'Фамилия']) ?>
        <?= $form->field($model, 'firstname')->textInput(['placeholder'=>'Имя']) ?>
        <?= $form->field($model, 'fathername')->textInput(['placeholder'=>'Отчество']) ?>
        <?= $form->field($model, 'email')->textInput(['placeholder'=>'e-mail']) ?>
        <?= $form->field($model, 'datebirth')->widget(DatePicker::className(), [            
            'dateFormat' => 'dd.MM.yyyy',
            'clientOptions'=> [
                'showOn' => 'both',   
                'firstDay' => 1,
                'dayNamesMin' => ["Вс","Пн","Вт","Ср","Чт","Пт","Сб"],
                'monthNamesShort' => ["Янв","Фев","Март","Апр","Май","Июнь","Июль","Авг","Сент","Окт","Нояб","Дек"],
                'changeMonth'=> true,
                'changeYear'=> true,
                'showOtherMonths'=> true,
                'selectOtherMonths'=>true,
                'yearRange' => '1900:2018'
            ],
            'options' => ['placeholder'=>'дд.мм.гггг']
        ]) ?>                
        <?= $form->field($model, 'username')->textInput(['placeholder'=>'Логин']) ?>
        <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Пароль']) ?>
        <?= $form->field($model, 'password_again')->passwordInput(['placeholder'=>'Пароль ещё раз']) ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success', 'name' => 'register-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
</div>
