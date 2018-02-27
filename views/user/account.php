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

        <h1 class="bg-white  pad-30 profile-title">Личные данные</h1>

        <div class="bg-white pad-30 marg-tb-20">
            <h2>Аватар</h2>

            <div class="form-group">
                <label for="photoFile">Загрузить фото</label>
                <input type="file" id="photoFile">
            </div>

            <div class="profile-image pull-right">
                <img src="/images/icons/close.png" alt="">
            </div>
        </div>

        <div class="bg-white pad-30 marg-tb-20">
            <h2 class="profile-section-title">Основная информация</h2>
            <?php $form = ActiveForm::begin([
                'action' => '',
                'options' => [
                    'class' => 'text-center'    
                ],
            ]); ?>

            <div class="row">
                <div class="form-group col-sm-6 col-md-4">
                    <?= $form->field($human, 'lastname')->textInput(['class'=>'form-control', 'id'=>'lastname'])->label('Фамилия') ?>
                </div>

                <div class="form-group col-sm-6 col-md-4">
                    <?= $form->field($human, 'firstname')->textInput(['class'=>'form-control', 'id'=>'firstname'])->label('Имя') ?>
                </div>

                <div class="form-group col-sm-6 col-md-4">
                    <?= $form->field($human, 'fathername')->textInput(['class'=>'form-control', 'id'=>'firstname'])->label('Отчество') ?>
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
                        ]) ?>
                </div>
            </div>
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
                <?php ActiveForm::end(); ?>
        </div>

        <div class="bg-white pad-30 marg-tb-20">
            <h2 class="profile-section-title">Контакты</h2>
            <?php $form = ActiveForm::begin([
                'action' => '',
                'options' => [
                    'class' => 'text-center'    
                ],
            ]); ?>

            <div class="row">
                <div class="form-group col-sm-6 col-md-4">
                    <?= $form->field($user, 'email')->textInput(['class'=>'form-control', 'id'=>'email'])->label('E-mail') ?>
                </div>

                <div class="form-group col-sm-6 col-md-4">
                    <?= $form->field($human, 'tel')->textInput(['class'=>'form-control', 'id'=>'tel'])->label('Телефон') ?>
                </div>

            </div>
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
                <?php ActiveForm::end(); ?>
        </div>
       
       
<!--       
        <div class="bg-white pad-30 marg-tb-20">
            <h2 class="profile-section-title">Контакты</h2>
            <form action="" class="text-center">
                <div class="row">
                    <div class="form-group col-sm-6 col-md-4">
                        <label for="email">Email</label>
                        <input name="email" type="text" class="form-control" id="email" value="<?= $human->getEmail(); ?>">
                    </div>
                    <div class="form-group col-sm-6 col-md-4">
                        <label for="phone">Телефон</label>
                        <input name="phone" type="text" class="form-control" id="phone" value="<?= $human->tel; ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
-->
        <div class="bg-white pad-30 marg-tb-20">
            <h2 class="profile-section-title">Сменить пароль</h2>
            <form action="" class="text-center">
                <div class="row">
                    <div class="form-group col-sm-6 col-md-4">
                        <label for="oldpassword">Старый пароль</label>
                        <input name="oldpassword" type="password" class="form-control" id="oldpassword">
                    </div>
                    <div class="form-group col-sm-6 col-md-4">
                        <label for="newpassword">Новый пароль</label>
                        <input name="newpassword" type="password" class="form-control" id="newpassword">
                    </div>
                    <div class="form-group col-sm-6 col-md-4">
                        <label for="repeatpassword">Повторить пароль</label>
                        <input name="repeatpassword" type="password" class="form-control" id="repeatpassword">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>

        <div class="bg-white pad-30 marg-tb-20">
            <h2 class="profile-section-title">Обязательные документы</h2>
            <div class="form-group">
                <label for="passport">Пасспорт</label>
                <input type="file" id="passport">
            </div>
            <div class="form-group">
                <label for="jobbook">Трудовая книжка</label>
                <input type="file" id="jobbook">
            </div>
            <div class="form-group">
                <label for="incomedoc">Справка о доходах</label>
                <input type="file" id="incomedoc">
            </div>
        </div>
    </div>
