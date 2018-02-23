<?php

/* @var $this yii\web\View */

$this->title = 'Уведомления';
?>
<div class="site-index center">

    <section class="notifications">
        <header class="">
            <span>Уведомления</span>
            <button type="button" class="btn btn-link" style="float: right">Удалить все</button>
        </header>

        <ul class="notifications-list">

            <li class="row notifications__row">
                <span class="col-md-1 notification__status-icon">
                    <img src="/images/icons/ok.png" alt="">
                </span>
                <a href="#" class="col-md-10">На вашу заявку 'ИПОТЕКА' поступило предложение от банка ВТБ24.</a>
                <button class="col-md-1 notification-delete-btn">
                    <img src="/images/icons/close.png" alt="">
                </button>
            </li>

            <li class="row notifications__row">
                <span class="col-md-1 notification__status-icon">
                    <img src="/images/icons/ok.png" alt="">
                </span>
                <a href="#" class="col-md-10">На вашу заявку 'ИПОТЕКА' поступило предложение от банка Альфа-Банк</a>
                <button class="col-md-1 notification-delete-btn">
                    <img src="/images/icons/close.png" alt="">
                </button>
            </li>
        </ul>
    </section>

</div>
