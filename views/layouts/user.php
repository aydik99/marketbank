<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Human;

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

    <body class="<?php echo Yii::$app->controller->action->id; ?>">
        <?php $this->beginBody() ?>
        <nav id='user_menu' class='navbar site-nav'>
            <div class="container-fluid center">

                <div class="navbar-header">
                    <a class="navbar-brand" href="<?=Yii::$app->urlManager->CreateUrl(['site/index']) ?>">
                        <img src="/images/marketbank.png" alt="marketbank logo" class="login-logo">
                        <span>market</span><span>bank</span>
                    </a>
                </div>

                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a 
                                href="<?=Yii::$app->urlManager->CreateUrl(['user/lk']) ?>"
                                class="site-nav-link"
                            >Главная</a>
                        </li>
                        <li>
                            <a 
                                href="<?=Yii::$app->urlManager->CreateUrl(['user/credits']) ?>"
                                class="site-nav-link"
                            >Мои кредиты</a>
                        </li>
                        <li>
                            <a 
                                href="<?=Yii::$app->urlManager->CreateUrl(['user/newrequest']) ?>"
                                class="site-nav-link site-nav-link__request"
                            >Подать заявку</a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right lk-menu">

                        <li class="dropdown">
                            <a 
                                href="#" 
                                class="dropdown-toggle lk-menu__item"
                                data-toggle="dropdown" 
                                role="button" 
                                aria-haspopup="true" 
                                aria-expanded="false"
                            >
                                <img src="/images/icons/alert.png" alt="Уведомления">
                                <span class="badge">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">На вашу заявку 'ИПОТЕКА' поступило предложение от банка ВТБ24.</a></li>
                                <li><a href="#">На вашу заявку 'ИПОТЕКА' поступило предложение от банка Альфа-Банк</a></li>
                                <li><a href="<?=Yii::$app->urlManager->CreateUrl(['user/alerts']) ?>">Все уведомления</a></li>
                            </ul>
                        </li>
                        <li>
                            <a
                                href="<?=Yii::$app->urlManager->CreateUrl(['user/messages']) ?>"
                                class="lk-menu__item"
                            >
                                <img src="/images/icons/mails.png" alt="Уведомления">
                                <span class="badge">2</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a
                                href="#"
                                class="dropdown-toggle lk-menu__item"
                                data-toggle="dropdown"
                                role="button"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                               <? 
                                $human = Human::findOne(Yii::$app->user->identity->id);
                                if (file_exists($human->avatar)):
                                ?>
                                    <img id="topmenu_ava" src="<?=$human->avatar;?>" alt="аватар пользователя">
                                <? else: ?>
                                    <img id="topmenu_ava" src="/images/ava_none.jpg" alt="нет аватара">
                                <? endif; ?>
                                <img src="/images/icons/arrow.png" alt="стрелка" class="arrow-menu-icon">
                            </a>
                            <ul class="dropdown-menu lk-menu__dropdown">
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
    <?php $this->registerJsFile('../../web/scripts/user.js',  ['position' => yii\web\View::POS_END]); ?>
    <?php $this->endPage() ?>
