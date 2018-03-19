<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Asktype;
/* @var $this yii\web\View */

$this->title = 'Подать заявку';

$orderOptions = [
    "mortgage" => "Ипотека",
    "loan" => "Кредит"
]

?>
    <div class="alert_good marg-tb-20">
        <?= Yii::$app->session->getFlash('message'); ?>
    </div>

    <div class="site-index center">
        <div class="col-md-9">
            <?php $askForm = ActiveForm::begin([
                'action' => '',
                'options' => [
                    'class' => 'bg-white order-form'    
                ],
            ]); ?>

            <legend class="order-title order-title--main">Оформление заказа</legend>

            <div class="form-group clearfix">
                <div class="col-md-3">
                    <?= $askForm->field($ask,'id_type')->
                        dropDownList(
                        ArrayHelper::map(Asktype::find()->asArray()->all(), 'id_type', 'name_type'),
                        ['id'=>'ordertype', 'class'=>'form-control'])->
                        label('Вид',['class'=>'col-md-2 order-label']);   
                    ?>
                </div>
            </div>

            <div class="form-group clearfix">
                <div class="col-md-3">
                    <?= $askForm->field($ask, 'summa')->textInput(['class'=>'form-control order-input', 'id'=>'amount'])->label('Сумма', ["class" => "col-md-2 order-label"]) ?>
                </div>
            </div>

            <div class="form-group order-description-block">
                <div class="col-md-12">    
                 <?= $askForm->field($ask, 'comment')->textarea(['class'=>'form-control order-description', 'id'=>'description', 'rows'=>'8'])->label('Пояснение', ["class" => "order-description-title"]) ?>                       
                </div>
            </div>

            <div class="form-group">
                <label for="attachedFile" class="btn btn-default order-file-btn">Прикрепить файл</label>
                <input type="file" id="attachedFile" class="hidden">
            </div>

            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary btn-lg pull-right']) ?>
                <?php ActiveForm::end(); ?>


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
