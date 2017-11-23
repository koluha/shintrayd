<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\jui\DatePicker;

$this->title = 'Персональные данные';
$this->params['breadcrumbs'][] = 'Персональные данные';
?>

<div class="block_breadcrumbs">
    <?php
    echo Breadcrumbs::widget([
        'homeLink' => ['label' => 'Главная', 'url' => '/'],
        'links' => [
            [ 'label' => Корзина,
                'url' => ['basket/index'],
            ],
            ucfirst(strtolower('Персональные данные')),
        ],
    ]);
    ?>
</div>
<div class="container">  
    <div class="row">
        <div class="link_basket">
            <div class="col-xs-3 item "><?php echo Html::a('1. Корзина', ['basket/index'], ['class' => '']); ?></div>
            <div class="col-xs-3 item "><?php echo Html::a('2. Доставка и оплата', ['basket/deliverypayment'], ['class' => 'class=""']); ?></div>
            <div class="col-xs-3 item active1"><?php echo Html::a('3. Ваши персональные данные', ['basket/personaldata'], ['class' => 'class=""']); ?></div>
            <div class="col-xs-3 item ">4. Подтвержение заказа</div>
        </div>
   </div>
    <div class="row">
        <h1>3. Ваши персональные данные</h1>
        <div class="col-xs-4">
            <div class="width_200">
                <?php
                //Отправить post и указать что это запрос с корзины и нужно перейти на другую страницу
                $form_reg = ActiveForm::begin(['action' => '/user/registration']);
                ?>
                <h2>Регистрация</h2>
                <?= $form_reg->field($model_reg, 'username'); ?>
                <?= $form_reg->field($model_reg, 'password')->passwordInput(); ?>
                <?= $form_reg->field($model_reg, 'password_')->passwordInput(); ?>
                <?= $form_reg->field($model_reg, 'fio'); ?> 
                <?= $form_reg->field($model_reg, 'email'); ?>
                <?= $form_reg->field($model_reg, 'phone'); ?>
                <?= $form_reg->field($model_reg, 'service_field')->hiddenInput()->label(false); ?>
                <div class="form-group">
                    <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary']); ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div> 
        <div class="col-xs-4">       
            <div class="width_200">
                <?php $form_login = ActiveForm::begin(['action' => '/user/login']); ?>
                <h2>Авторизация</h2>
                <?= $form_login->field($model_log, 'username') ?>
                <?= $form_login->field($model_log, 'password')->passwordInput(); ?>
                <?= $form_login->field($model_log, 'rememberMe')->checkbox(); ?>
                <?= $form_login->field($model_log, 'service_field')->hiddenInput()->label(false); ?>
                <div class="form-group">
                    <?= Html::submitButton('Вход', ['class' => 'btn btn-primary']); ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div> 
        </div>
        <div class="col-xs-4"></div>
    </div>