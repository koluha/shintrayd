<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\jui\DatePicker;

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
                  ucfirst(strtolower('Заказ')),
            ],
        ]);
        ?>
</div>
<div class="container">  
    <div class="row">
        <h1>Заказ № <?= $id_order ?></h1>

        <p>В ближайшее время мы свяжемся с Вами для подтверждения заказа <?= $id_order ?> по указанному Вами телефону или email</p>
        
        </div>
    </div>