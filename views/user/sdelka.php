<?php

/* @var $this yii\web\View */

$this->title = 'Сделка';
?>
    <div class="site-index center">

        <div class="col-md-9">
            <div class="block1">
                <h2>
                    <?=$ask->asktype->name_type; ?>
                </h2>
                <p>
                    <?=$ask->comment;?> &#40;
                        <?=$ask->summa;?>&nbsp;руб&#41;</p>
            </div>
        </div>


        <div class="col-md-3">
            <div class="block4">
                <div class="block3_head" id="bh_3">
                    <h3>Детали</h3>
                </div>
                <div class="detail_text">
                    <p>Выдано: 4000000 руб.</p>
                    <p>Годовая ставка: 15%.</p>
                    <p>Срок: 5 лет</p>
                    <p><a href="#">Договор</a></p>
                </div>
            </div>

        </div>
        
        <? if (!is_null($ask->date_close)): ?>

        <div class="col-md-9">
            <div class="block1">
                <div class="block2">
                    <h3>Кредит погашен</h3><span><?=$ask->summa;?>&nbsp;руб</span>
                </div>
                <img src="/images/sdelka.jpg" id="sdelka_img">
                <p class="sdelka_text"><?=$ask->date_close; ?> был погашен кредит.</p>
            </div>
        </div>
        <? endif; ?>


        <div class="col-md-9">
            <div class="block3">
                <div class="block3_head">
                    <img src="/images/vtb.png">
                </div>

                <div class="messages">
                    <div class="message">
                        <div class="user_message">
                            <p>Здравствуйте. Кредит погасил.</p>
                        </div>
                    </div>
                    <div class="message">
                        <div class="bank_message">
                            <p>Благодарим вас за сотрудничество</p>
                        </div>
                    </div>
                </div>
                <form>
                    <textarea placeholder="Введите сообщение"></textarea>
                </form>

                <div class="menu_message">
                    <div class="menu_message2">
                        <img src="/images/smile.png">
                        <img src="/images/file.png">
                    </div>
                    <img src="/images/save_message.png" id="save_message">
                </div>
            </div>

        </div>
