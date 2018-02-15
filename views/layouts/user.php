<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">

    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../web/css/user.css">
        <?= Html::csrfMetaTags() ?>
            <title>
                <?= Html::encode($this->title) ?>
            </title>
            <?php $this->head() ?>
    </head>

    <body>
        <?php $this->beginBody() ?>
        <nav id='user_menu' class='center'>
            <div id="logo" class="nav_btn">LOGO</div>
            <div id="nav_menu_links">
                <div class="nav_btn"><a href="<?=Yii::$app->urlManager->CreateUrl(['user/lk']) ?>">Главная</a></div>
                <div class="nav_btn"><a href="<?=Yii::$app->urlManager->CreateUrl(['user/credits']) ?>">Мои кредиты</a></div>
                <div class="nav_btn"><a href="<?=Yii::$app->urlManager->CreateUrl(['user/newrequest']) ?>">Подать заявку</a></div>
            </div>
            <div id="nav_right_btns">
                <ul id="ul_right">
                    <li><a href="<?=Yii::$app->urlManager->CreateUrl(['user/alerts']) ?>">Увед</a>
                        <ul id="ul_alrt" class="user_acc_sub">
                            <li><a href="">На вашу заявку 'ИПОТЕКА' поступило предложение от банка ВТБ24.</a></li>
                            <li><a href="">На вашу заявку 'ИПОТЕКА' поступило предложение от банка Альфа-Банк</a></li>
                        </ul>
                    </li>
                    <li><a href="<?=Yii::$app->urlManager->CreateUrl(['user/messages']) ?>">Сбщ</a></li>
                    <li><a href="">Акк</a>
                        <ul class="user_acc_sub">
                            <li><a href="<?=Yii::$app->urlManager->CreateUrl(['user/account']) ?>">Профиль</a></li>
                            <li>
                                <?=Html::beginForm(['/site/logout'], 'post') ?>
                                <?=Html::submitButton('Выход (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout']) ?>
                                <?=Html::endForm() ?>
                                
                            </li>
                        </ul>

                    </li>
                </ul>
            </div>
        </nav>

        <div class="wrap">
            <div class=" <?php echo Yii::$app->controller->action->id; ?>">
                <?= Alert::widget() ?>
                    <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="">&#64;&nbsp;MARKETBANK&nbsp;
                    <?= date('Y') ?>
                </p>

            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>

    </html>
    <?php $this->endPage() ?>
