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

        <form action="" class="bg-white">
            <fieldset>
                <legend>Оформление заказа</legend>

                <div class="form-group">
                    <label for="ordertype" class="col-md-2">Вид</label>
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

                <div class="form-group">
                    <label for="amout" class="col-md-2">Сумма</label>
                    <div class="col-md-10">
                        <input type="number" id="amount" value="0" min="0" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Пояснение</label>
                    <textarea name="" id="description" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="attachedFile">Прикрепить файл</label>
                    <input type="file" id="attachedFile">
                </div>

                <button type="submit" class="btn btn-primary pull-right">Отправить</button>

            </fieldset>
        </form>

    </div>

    <div class="col-md-3">
        <div class="bg-white">
            <h2>Шаги</h2>

            <ul class="list-group">
                <li class="list-group-item">Создание</li>
                <li class="list-group-item">В аукционе</li>
                <li class="list-group-item">Сделка</li>
            </ul>
        </div>
    </div>

</div>