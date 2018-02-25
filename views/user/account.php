<?php
use app\models\Human;
/* @var $this yii\web\View */

$this->title = 'Профиль';
?>
<div class="site-index center">

    <h1 class="bg-white profile-title">Личные данные</h1>

    <div class="bg-white">
        <h2>Аватар</h2>

        <div class="form-group">
            <label for="photoFile">Загрузить фото</label>
            <input type="file" id="photoFile">
        </div>

        <div class="profile-image pull-right">
            <img src="/images/icons/close.png" alt="">
        </div>
    </div>
    
    <div class="bg-white">
        <h2 class="profile-section-title">Основная информация</h2>
        <form action="" class="text-center">
            <div class="row">
                <div class="form-group col-sm-6 col-md-4">
                    <label for="firstname">Имя</label>
                    <input name="firstname" type="text" class="form-control" id="firstname" value="<?= $human->firstname; ?>">
                </div>
                <div class="form-group col-sm-6 col-md-4">
                    <label for="lastname">Фамилия</label>
                    <input name="lastname" type="text" class="form-control" id="lastname" value="<?= $human->lastname; ?>">
                </div>
                <div class="form-group col-sm-6 col-md-4">
                    <label for="fathername">Отчество</label>
                    <input name="fathername" type="text" class="form-control" id="fathername" value="<?= $human->fathername; ?>">
                </div>
                <div class="form-group col-sm-6 col-md-12">
                    <label for="datebirth">Дата рождения</label>
                    <input name="datebirth" type="date" class="form-control" id="datebirth">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
    
    <div class="bg-white">
        <h2 class="profile-section-title">Контакты</h2>
        <form action="" class="text-center">
            <div class="row">
                <div class="form-group col-sm-6 col-md-4">
                    <label for="email">Email</label>
                    <input name="email" type="text" class="form-control" id="email">
                </div>
                <div class="form-group col-sm-6 col-md-4">
                    <label for="phone">Телефон</label>
                    <input name="phone" type="text" class="form-control" id="phone">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
    
    <div class="bg-white">
        <h2 class="profile-section-title">Сменить пароль</h2>
        <form action="" class="text-center">
            <div class="row">
                <div class="form-group col-sm-6 col-md-4">
                    <label for="oldpassword">Старый пароль</label>
                    <input name="oldpassword" type="password" class="form-control" id="oldpassword">
                </div>
                <div class="form-group col-sm-6 col-md-4">
                    <label for="newpassword">Новый пароль</label>
                    <input name="newpassword" type="password" class="form-control" id="newpassword">
                </div>
                <div class="form-group col-sm-6 col-md-4">
                    <label for="repeatpassword">Повторить пароль</label>
                    <input name="repeatpassword" type="password" class="form-control" id="repeatpassword">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
    
    <div class="bg-white">
        <h2 class="profile-section-title">Обязательные документы</h2>
        <div class="form-group">
            <label for="passport">Пасспорт</label>
            <input type="file" id="passport">
        </div>
        <div class="form-group">
            <label for="jobbook">Трудовая книжка</label>
            <input type="file" id="jobbook">
        </div>
        <div class="form-group">
            <label for="incomedoc">Справка о доходах</label>
            <input type="file" id="incomedoc">
        </div>
    </div>
</div>
