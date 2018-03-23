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
                       <? if ($data->status == 1): ?>
                            ПОДАНО <time><?=$data->date_start ?></time>
                        <? elseif($data->status == 2): ?>    
                            НАЧАЛО <time><?//=$data->date_start ?></time>                        
                        <? else: ?>    
                            ЗАВЕРШЕН <time><?=$data->date_close ?></time>       
                        <? endif; ?>
                        
                        <? if ($data->status == 1): ?>
                            <span class="pull-right">9 предложений</span>                        
                        <? else: ?>
                            <span class="pull-right"><a href="<?=Yii::$app->urlManager->CreateUrl(['user/sdelka','sdelka_id'=>$data->id_ask]) ?>">ПЕРЕЙТИ</a></span>                            
                        <? endif; ?>
                    </footer>
                </section>
             <? endforeach; ?>
        </div>

    </div>
