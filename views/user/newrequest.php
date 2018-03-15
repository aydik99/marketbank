<?php

/* @var $this yii\web\View */

$this->title = 'Подать заявку';

$orderOptions = [
    "mortgage" => "Ипотека",
    "loan" => "Кредит"
]

?>
<div class="site-index center">

    <div class="col-md-9">

        <form action="" class="bg-white order-form">
            <fieldset>
                <legend class="order-title order-title--main">Оформление заказа</legend>

                <div class="form-group clearfix">
                    <label for="ordertype" class="col-md-2 order-label">Вид</label>
                    <div class="col-md-10">
                        <select name="order" id="ordertype" class="form-control">
                        <?php

                            foreach ($orderOptions as $key => $value) {
                                echo "<option value='$key'>$value</option>";
                            }

                        ?>
                        </select>
                    </div>
                </div>

                <div class="form-group clearfix">
                    <label for="amout" class="col-md-2 order-label">Сумма</label>
                    <div class="col-md-10">
                        <input type="number" id="amount" value="0" min="0" class="form-control order-input">
                    </div>
                </div>

                <div class="form-group order-description-block">
                    <label for="description" class="order-description-title">Пояснение</label>
                    <textarea name="" id="description" class="form-control order-description" rows="8"></textarea>
                </div>

                <div class="form-group">
                    <label for="attachedFile" class="btn btn-default order-file-btn">Прикрепить файл</label>
                    <input type="file" id="attachedFile" class="hidden">
                </div>

                <button type="submit" class="btn btn-primary btn-lg pull-right">Отправить</button>

            </fieldset>
        </form>

    </div>

    <div class="col-md-3">
        <div class="bg-white">
            <h2 class="order-title text-center">Шаги</h2>

            <ul class="list-group order-step-group">
                <li class="list-group-item order-step">Создание</li>
                <li class="list-group-item order-step">В аукционе</li>
                <li class="list-group-item order-step">Сделка</li>
            </ul>
        </div>
    </div>

</div>