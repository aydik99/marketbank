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
                <? if (file_exists($human->avatar)): ?>
                    <img src="<?=$human->avatar?>" id="ava" alt="avatar">
                    <? else:?>
                        <img src="/images/ava_none.jpg" id="ava" alt="avatar">
                        <? endif;?>
            </div>
            <h2 class="profile-section-title">Аватар</h2>

            <?php
            $avaUpload = ActiveForm::begin([
                'options'=>['enctype'=>'multipart/form-data']
            ]); ?>

                <div class="custom-label">
                    <?= $avaUpload->field($upload, 'file')->fileInput(); ?>
                        <?= $avaUpload->field($reqtype, 'requestType')->hiddenInput(['value'=> 'avatar'])->label(false); ?>
                </div>

                <div class="text-center">
                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end();  ?>
        </div>

        <div class="profile-section">
            <h2 class="profile-section-title">Основная информация</h2>
            <?php $main = ActiveForm::begin([
                'action' => '',
                'options' => [
                    'class' => 'text-center'    
                ],
            ]); ?>

            <div class="row">
                <div class="form-group col-sm-6 col-md-4">
                    <?= $main->field($human, 'lastname')->textInput(['class'=>'form-control', 'id'=>'lastname'])->label('Фамилия', ["class" => "input-label"]) ?>
                        <?= $main->field($reqtype, 'requestType')->hiddenInput(['value'=> 'mainInfo'])->label(false); ?>
                </div>

                <div class="form-group col-sm-6 col-md-4">
                    <?= $main->field($human, 'firstname')->textInput(['class'=>'form-control', 'id'=>'firstname'])->label('Имя', ["class" => "input-label"]) ?>
                </div>

                <div class="form-group col-sm-6 col-md-4">
                    <?= $main->field($human, 'fathername')->textInput(['class'=>'form-control', 'id'=>'fathername'])->label('Отчество', ["class" => "input-label"]) ?>
                </div>

                <div class="form-group col-sm-6 col-md-12">

                    <?= $main->field($human, 'datebirth')->widget(DatePicker::className(), [
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
            <?php $contacts = ActiveForm::begin([
                'action' => '',
                'options' => [
                    'class' => 'text-center'    
                ],
            ]); ?>

            <div class="row">
                <div class="form-group col-sm-6 col-md-4 col-md-offset-2">
                    <?= $contacts->field($user, 'email')->textInput(['class'=>'form-control', 'id'=>'email'])->label('E-mail', ["class" => "input-label"]) ?>
                        <?= $contacts->field($reqtype, 'requestType')->hiddenInput(['value'=> 'contacts'])->label(false); ?>
                </div>

                <div class="form-group col-sm-6 col-md-4">
                    <?= $contacts->field($human, 'tel')->textInput(['class'=>'form-control', 'id'=>'tel'])->label('Телефон', ["class" => "input-label"]) ?>
                </div>
            </div>
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>

                <?php ActiveForm::end(); ?>
        </div>

        <div class="profile-section">
            <h2 class="profile-section-title">Сменить пароль</h2>
            <?php $pass = ActiveForm::begin([
                'action' => '',
                'options' => [
                    'class' => 'text-center'    
                ],
            ]); ?>
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
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
                <?php ActiveForm::end(); ?>
        </div>

        <div class="profile-section">
            <h2 class="profile-section-title">Обязательные документы</h2>

            <?php $pasp = ActiveForm::begin([
                'id'=> 'form_pasp',
                'action' => '',
                'options' => [
                    'class' => 'text-center'    
                ],
            ]); ?>
            <div class="form-group form-justify">
                <p class="input-label">Паспорт</p>

                <div class="custom-label">
                    <div class="form-group field-uploadavatar-file">
                        <?= $pasp->field($updoc, 'file')->fileInput(['id'=>'doc1']); ?>
                        <?= $pasp->field($reqtype, 'requestType')->hiddenInput(['value'=> 'document'])->label(false); ?>
                        <?= $pasp->field($reqtype, 'docType')->hiddenInput(['value'=> 'pasp'])->label(false); ?>
                    </div>
                </div>
            </div>
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
                <?php ActiveForm::end(); ?>

                <?php $job = ActiveForm::begin([
                'id'=>'form_job',
                'action' => '',
                'options' => [
                    'class' => 'text-center'    
                ],
            ]); ?>
                <div class="form-group form-justify">
                    <p class="input-label">Трудовая книжка</p>

                    <div class="custom-label">
                        <div class="form-group field-uploadavatar-file">
                            <?= $job->field($updoc, 'file')->fileInput(['id'=>'doc2']); ?>
                            <?= $job->field($reqtype, 'requestType')->hiddenInput(['value'=> 'document'])->label(false); ?>
                            <?= $job->field($reqtype, 'docType')->hiddenInput(['value'=> 'job'])->label(false); ?>
                        </div>
                    </div>
                </div>
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
                    <?php ActiveForm::end(); ?>

                    <?php $income = ActiveForm::begin([
                'id'=>'form_income',
                'action' => '',
                'options' => [
                    'class' => 'text-center'    
                ],
            ]); ?>
                    <div class="form-group form-justify">
                        <p class="input-label">Справка о доходах</p>

                        <div class="custom-label">
                            <div class="form-group field-uploadavatar-file">
                            <?= $income->field($updoc, 'file')->fileInput(['id'=>'doc3']); ?>
                            <?= $income->field($reqtype, 'requestType')->hiddenInput(['value'=> 'document'])->label(false); ?>
                            <?= $income->field($reqtype, 'docType')->hiddenInput(['value'=> 'income'])->label(false); ?>
                            </div>
                        </div>
                    </div>
                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
                        <?php ActiveForm::end(); ?>
        </div>
    </div>
