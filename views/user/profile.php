<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = 'Личный кабинет пользователя';
$this->params['breadcrumbs'][] = 'Личный кабинет пользователя';
?>

<div class="block_breadcrumbs">
    <?php
    echo Breadcrumbs::widget([
        'homeLink' => ['label' => 'Главная', 'url' => '/'],
        'links' => ['Личный кабинет пользователя'],
    ]);
    ?>
</div>
<div class="container">  
    <div class="row">
        <div class="big_lk">
            <div class="sel_lk">
                <div class="sel_lk_in">
                    <h2><?php echo Html::a('Личные данные', ['user/update']) ?></h2>
                    <p>Пользователь: <?php echo Yii::$app->user->identity->username ?></p>
                </div>
            </div>
            <div class="sel_lk">
                <div class="sel_lk_in">
                    <h2><?php echo Html::a('Корзина', '/basket/index/', array('class' => 'cart_lk')) ?></h2>
                    <p>Содержимое вашей корзины.</p>
                </div>
            </div>
            <div class="sel_lk">
                <div class="sel_lk_in">
                    <h2><?php echo Html::a('Заказы', '/order/list/', array('class' => 'order_lk')) ?></h2>
                    <p>История и мониторинг ваших заказов</p>
                </div>
            </div>
        </div>
    </div>
</div>
