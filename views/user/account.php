<?php
use app\models\Human;
use app\models\User;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\jui\DatePicker;
/* @var $this yii\web\View */

$this->title = 'Профиль';
?>
    <div class="site-index center">

        <h1 class="profile-section profile-title">Личные данные</h1>

        <div class="alert_good marg-tb-20">
            <?= Yii::$app->session->getFlash('saved'); ?>
        </div>

        <div class="profile-section">
            <div class="profile-image">
                <img src="<?=$human->avatar?>" id="ava" alt="avatar">
            </div>
            <h2 class="profile-section-title">Аватар</h2>
                        
            <?php
            $avaUpload = ActiveForm::begin([
                'options'=>['enctype'=>'multipart/form-data']
            ]); ?>
        
            <div class="custom-label">
                <?= $avaUpload->field($upload, 'file')->fileInput(); ?>
            </div>

            <div class="text-center">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
            </div>
            
            <?php ActiveForm::end();  ?>           
        </div>

        <div class="profile-section">
            <h2 class="profile-section-title">Основная информация</h2>
            <?php $form = ActiveForm::begin([
                'action' => '',
                'options' => [
                    'class' => 'text-center'    
                ],
            ]); ?>

            <div class="row">
                <div class="form-group col-sm-6 col-md-4">
                    <?= $form->field($human, 'lastname')->textInput(['class'=>'form-control', 'id'=>'lastname'])->label('Фамилия', ["class" => "input-label"]) ?>
                </div>

                <div class="form-group col-sm-6 col-md-4">
                    <?= $form->field($human, 'firstname')->textInput(['class'=>'form-control', 'id'=>'firstname'])->label('Имя', ["class" => "input-label"]) ?>
                </div>

                <div class="form-group col-sm-6 col-md-4">
                    <?= $form->field($human, 'fathername')->textInput(['class'=>'form-control', 'id'=>'fathername'])->label('Отчество', ["class" => "input-label"]) ?>
                </div>

                <div class="form-group col-sm-6 col-md-12">

                    <?= $form->field($human, 'datebirth')->widget(DatePicker::className(), [
                        'dateFormat' => 'dd.MM.yyyy',
                        'clientOptions'=> [
                            'defaultDate' => $human->datebirth,                            
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
                        ])->label('Дата рождения', ["class" => "input-label"]) ?>
                </div>
            </div>
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
                <?php ActiveForm::end(); ?>
        </div>

        <div class="profile-section">
            <h2 class="profile-section-title">Контакты</h2>
            <?php $form = ActiveForm::begin([
                'action' => '',
                'options' => [
                    'class' => 'text-center'    
                ],
            ]); ?>

            <div class="row">
                <div class="form-group col-sm-6 col-md-4 col-md-offset-2">
                    <?= $form->field($user, 'email')->textInput(['class'=>'form-control', 'id'=>'email'])->label('E-mail', ["class" => "input-label"]) ?>
                </div>

                <div class="form-group col-sm-6 col-md-4">
                    <?= $form->field($human, 'tel')->textInput(['class'=>'form-control', 'id'=>'tel'])->label('Телефон', ["class" => "input-label"]) ?>
                </div>
            </div>
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>

            <?php ActiveForm::end(); ?>
        </div>

        <div class="profile-section">
            <h2 class="profile-section-title">Сменить пароль</h2>
            <form action="" class="text-center">
                <div class="row">
                    <div class="form-group col-sm-6 col-md-4">
                        <label for="oldpassword" class="input-label">Старый пароль</label>
                        <input name="oldpassword" type="password" class="form-control" id="oldpassword">
                    </div>
                    <div class="form-group col-sm-6 col-md-4">
                        <label for="newpassword" class="input-label">Новый пароль</label>
                        <input name="newpassword" type="password" class="form-control" id="newpassword">
                    </div>
                    <div class="form-group col-sm-6 col-md-4">
                        <label for="repeatpassword" class="input-label">Повторить пароль</label>
                        <input name="repeatpassword" type="password" class="form-control" id="repeatpassword">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>

        <div class="profile-section">
            <h2 class="profile-section-title">Обязательные документы</h2>
            <div class="form-group form-justify">
                <p class="input-label">Паспорт</p>

                <div class="custom-label">
                    <div class="form-group field-uploadavatar-file">
                        <label class="control-label" for="passport">Загрузить</label>
                        <input type="file" id="passport">
                    </div>
                </div>
            </div>


            <div class="form-group form-justify">
                <p class="input-label">Трудовая книжка</p>

                <div class="custom-label">
                    <div class="form-group field-uploadavatar-file">
                        <label class="control-label" for="jobbook">Загрузить</label>
                        <input type="file" id="jobbook">
                    </div>
                </div>
            </div>

            <div class="form-group form-justify">
                <p class="input-label">Справка о доходах</p>

                <div class="custom-label">
                    <div class="form-group field-uploadavatar-file">
                        <label class="control-label" for="incomedoc">Загрузить</label>
                        <input type="file" id="incomedoc">
                    </div>
                </div>
            </div>

        </div>
    </div>
