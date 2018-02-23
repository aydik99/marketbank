<?php
use app\models\Human;
/* @var $this yii\web\View */

$this->title = 'Профиль';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Профиль пользователя</h1>
        <?= $human->lastname; ?><br>
        <?= $human->firstname; ?><br>
        <?= $human->fathername; ?><br>
        <?= $human->datebirth; ?>
        


    </div>
</div>
