<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$tagline = 'Биржа финансово-банковских услуг';
$this->title = 'Войти';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <div class="login-link-wrapper text-center">
        <a 
            href="<?=Yii::$app->urlManager->CreateUrl(['site/index']) ?>"
            class="login-site-link"
        >
            <img src="/images/marketbank.png" alt="marketbank logo" class="login-logo">
            <span>market</span><span>bank</span>
        </a>
    </div>

    <h1 class="login-tagline text-center"><?= Html::encode($tagline) ?></h1>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-8\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-4 control-label']
        ],
    ]); ?>

        <h2 class="text-center"><?= Html::encode($this->title) ?></h2>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Логин') ?>

        <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-12\">{input} {label}</div>\n<div class=\"col-lg-12\">{error}</div>",
        ])->label('Запомнить меня') ?>

        <div class="form-group">
            <div class="col-lg-12">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'login-button']) ?>
            </div>
        </div>
        
        <div class="text-center login-err-message"><?=$model->err_message ?></div>

        <div class="text-center" style="color:#999;">
            Ещё не зарегестрированы <a href="<?=Yii::$app->urlManager->CreateUrl(['site/register']) ?>">Регистрация</a>        
        </div>

    <?php ActiveForm::end(); ?>

</div>
