<div class="user_main center">

    <div class="col-md-3">

        <div class="user-info-block">
            <figure>
                <img src="../../web/images/ava1.jpg" alt="user photo">
                <figcaption class="user-name">Борис</figcaption>
            </figure>

            <p class="user-block-text">Мои кредиты</p>
            <p class="user-block-text">Всего: <span class="pull-right">2</span></p>
        </div>

    </div>

    <div class="col-md-9">
       
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

            <div class="notifications__footer">
                <a href="<?=Yii::$app->urlManager->CreateUrl(['user/alerts']) ?>">Посмотреть ещё</a></li>
            </div>
        </section>



        <section class="requests">
            <h3 class="text-center">В настоящий момент у вес нет созданных заявок</h3>
            <div class="text-center">
                <a 
                    href="<?=Yii::$app->urlManager->CreateUrl(['user/newrequest']) ?>"
                    class="btn btn-default request-btn"
                >Подать заявку</a>
            </div>
        </section>



        <section class="how-works">
            <h3 class="how-works-title">Как это работает</h3>

            <ul class="row text-center">
                <li class="col-xs-12 col-md-4">
                    <figure class="how-works-item">
                        <img src="/images/lk/how-works-1.png" alt="">
                        <figcaption>Вы размещаете заказ</figcaption>
                    </figure>
                </li>
                <li class="col-xs-12 col-md-4">
                    <figure class="how-works-item">
                        <img src="/images/lk/how-works-2.png" alt="">
                        <figcaption>Выбираете выгодное предложение</figcaption>
                    </figure>
                </li>
                <li class="col-xs-12 col-md-4">
                    <figure class="how-works-item">
                        <img src="/images/lk/how-works-3.png" alt="">
                        <figcaption>Получаете кредит!</figcaption>
                    </figure>
                </li>
            </ul>

            <footer class="how-works__footer">
                Если у вас возникли трудности обратитесь в <a href="#">службу поддержки</a>
            </footer>
        </section>

    </div>

</div>
