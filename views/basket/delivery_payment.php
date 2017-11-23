<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\jui\DatePicker;
use app\models\Order;

$this->title = 'Доставка и оплата';
$this->params['breadcrumbs'][] = 'Доставка и оплата';
?>

<div class="block_breadcrumbs">
    <?php
    echo Breadcrumbs::widget([
        'homeLink' => ['label' => 'Главная', 'url' => '/'],
        'links' => [
            [ 'label' => Корзина,
                'url' => ['basket/index'],
            ],
            ucfirst(strtolower('Доставка и оплата')),
        ],
    ]);
    ?>
</div>
<div class="container">  
    <div class="row">
          <div class="link_basket">
            <div class="col-xs-3 item"><?php echo Html::a('1. Корзина', ['basket/index'], ['class' => '']); ?></div>
            <div class="col-xs-3 item active1"><?php echo Html::a('2. Доставка и оплата', ['basket/deliverypayment'], ['class' => 'class=""']); ?></div>
            <div class="col-xs-3 item">3. Ваши персональные данные</div>
            <div class="col-xs-3 item ">4. Подтвержение заказа</div>
        </div>
    </div>
    <div class="row">
        <br>
        <?= Html::a('Ознакомиться с условиями доставки', ['site/delivery']) ?>
        <h1>2. Доставка и оплата</h1>
        <div class="width_400">
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'delivery_method')->dropDownList([
                'pickup' => 'Самовывоз',
                
                //'adres_delivery' => "В пределах МКАД ".Order::PriceDelivery()." руб.",
                //'adres_delivery_z' => "За пределы МКАД ".Order::PriceDelivery_z()." руб = 1 км.",
                //'transport' => 'Транспортной компанией'
                ]);
            ?>
            <?= $form->field($model, 'address') ?>
            <?= $form->field($model, 'cash_method')->dropDownList([
                'cash' => 'Наличными в магазине',
                'card' => 'Банковской картой',
                'account' => 'Оплата по счету'
            ]);
            ?>

            <?php
            echo $form->field($model, 'date')->input(DatePicker::widget([
                        'model' => $model,
                        'attribute' => 'date',
                        'language' => 'ru',
                        'dateFormat' => 'yyyy-MM-dd'
            ]));
            ?>
            <?= $form->field($model, 'comment')->textarea(['rows' => 2, 'cols' => 5])->label('Комментарий'); ?>

            <div class="form-group">
                <?= Html::submitButton('Продолжить', ['class' => 'btn btn-primary']); ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>