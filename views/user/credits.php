<?php

/* @var $this yii\web\View */

$this->title = 'Мои кредиты';
?>
    <div class="site-index center">

        <div class="col-md-3">

            <ul class="list-group">
                <li class="list-group-item active" data-filter="0">Все кредиты</li>
                <li class="list-group-item" data-filter="1">В аукционе</li>
                <li class="list-group-item" data-filter="2">Активные</li>
                <li class="list-group-item"  data-filter="3">Завершённые</li>
            </ul>

        </div>

        <div class="col-md-9">
            <? foreach ($ask as $data): ?>
               
                <section class="credit-item" data-status="<?=$data->status; ?>">
                    <header class="credit-item__header">
                        <h3 class="text-center"><?=$data->asktype->name_type;?>&nbsp;
                        &#40;<?=$data->summa;?>&nbsp;руб&#41;</h3>
                    </header>

                    <p class="credit-item__content">                        
                        <?= $data->comment; ?>
                    </p>

                    <footer class="credit-item__footer">
                        Подано: <time><?=$data->date_start ?></time>
                        <span class="pull-right">9 предложений</span>
                    </footer>
                </section>
             <? endforeach; ?>
        </div>

    </div>
