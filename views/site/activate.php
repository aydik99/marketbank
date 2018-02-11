<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$tagline = 'Биржа финансово-банковских услуг';
if ($good_key) {
    $this->title = 'Профиль успешно активирован.';
} else {
    $this->title = 'Неправильная ссылка активации.';
}

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

        <h2 class="text-center"><?= Html::encode($this->title) ?></h2>

    
        
        <div class="text-center" style="color:#999;">
            Хотите <a href="<?=Yii::$app->urlManager->CreateUrl(['site/login']) ?>">войти на сайт</a>&#63;
        </div>
</div>
