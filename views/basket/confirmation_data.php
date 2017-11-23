<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\jui\DatePicker;
use app\models\Basket;
use app\models\Order;
use app\models\base\Tyre;

$this->title = 'Подтверждение данных';
$this->params['breadcrumbs'][] = 'Подтверждение данных';
?>

<div class="block_breadcrumbs">
    <?php
    echo Breadcrumbs::widget([
        'homeLink' => ['label' => 'Главная', 'url' => '/'],
        'links' => [
            [ 'label' => Корзина,
                'url' => ['basket/index'],
            ],
            ucfirst(strtolower('Подтверждение данных')),
        ],
    ]);
    ?>
</div>
<div class="container">  
    <div class="row">
        <div class="link_basket">
            <div class="col-xs-3 item "><?php echo Html::a('1. Корзина', ['basket/index'], ['class' => '']); ?></div>
            <div class="col-xs-3 item "><?php echo Html::a('2. Доставка и оплата', ['basket/deliverypayment'], ['class' => 'class=""']); ?></div>
            <div class="col-xs-3 item"><?php echo Html::a('3. Ваши персональные данные', ['basket/personaldata'], ['class' => 'class=""']); ?></div>
            <div class="col-xs-3 item active1"><?php echo Html::a('4. Подтвержение заказа', ['basket/confirmationdata'], ['class' => 'class=""']); ?></div>
        </div>
    </div>

    <div class="row">
        <h1>4. Подтвержение заказа</h1>
        <h3>Ваши личные данные данные:</h3>
       <!-- <span><b>Логин:</b></span> -->
        <?php // $user_ob->username; ?> <!--<br><br>-->
        <span><b>Имя, фамилия:</b></span>
        <?= $user_ob->fio; ?> <br><br>
        <span><b>Email:</b></span>
        <?= $user_ob->email; ?> <br><br>
        <span><b>Ваш контактный телефон :</b></span>
        <?= $user_ob->phone; ?> <br><br>



        <h3>Информация о доставке:</h3>
        <span><b>Способ доставки:</b></span>
        <?= Basket::getd_method($order->d_method); ?> <br><br>

        <?php
        if ($order->d_method == 'adres_delivery') {
            echo '<span><b>Адрес доставки:</b></span>';
            echo $order->d_address;
            echo '<br><br>';

            //Записать в заказ цену доставки
        }
        ?>


        <span><b>Способ оплаты:</b></span>
        <?= Basket::getpay_method($order->d_cash_method); ?> <br><br>

        <span><b>Удобная дата доставки:</b></span>
        <?= $order->d_date; ?> <br><br>

        <span><b>Комментарий:</b></span>
        <?= $order->d_comments; ?> <br><br>




        <h3>Ваши товары:</h3>

        <?php echo '<div id="cart">
    <table id="lot">
        <tr>
            <th width="100">Картинка</th>
            <th width="190">Наименование</th>
            <th width="80">Размер</th>
            <th width="80" class="cost">Кол-во</th>
            <th width="80" class="cost">Цена</th>
            <th width="80" class="cost">Сумма</th>
        </tr>' ?>


        <?php
        foreach ($data['list'] as $cart) {
            echo '<tr>';
            if ($cart['type'] == 'tyre') {
                $tyre = 'Шина';
            } elseif ($cart['type'] == 'disk') {
                $tyre = 'Диск';
            }
                echo '<td></td>';
            echo '<td><b>' . $tyre . '</b></td>';
            echo '<td></td>';
            echo '</tr>';

            echo '<tr>';
            $ded = $cart['size'];
            $size = explode("|", $ded);
             echo '<td>
             <div class="pr_img_block_cart ">
                    <div class="pr_img_cart">
                        <img src=' . Tyre::getImgTyre($cart['model']) . '>
                    </div>
                    <div class="pr_article">
                      <!--  <span>Код продукта:</span> 4565215 --->
                    </div>
                </div>
           </td>';
            echo '<td><b>' . $cart['brand'] . '</b><br><b>' . $cart['model'] . '</b><br>' . $size[1] . '<br>Артикул: ' . $cart['article'] . ' </td>';
            echo '<td>' . $size[0] . '</td>';

            echo '<td><b>' . $cart['count'] . '</b></td>';


            echo '<td class="cost">' . number_format($cart['price'], 0, '', ' ') . ' руб.</td>';
            echo '<td class="cost">' . number_format($cart['count'] * $cart['price'], 0, '', ' ') . ' руб.</td>';

            echo '</tr>';
        }
//  echo '</div>';

        echo '</table>';
        echo '<br>';
        echo '<div class="total"><h3><b>Стоймость всех товаров ' . number_format($data['sumtotal'], 0, '', ' ') . ' руб.</b></h3></div>';

        if ($order->d_method == 'adres_delivery') {
            echo '<div class="total"><h3><b>Стоймость доставки в пределах МКАД ' . number_format(Order::PriceDelivery(), 0, '', ' ') . ' руб.</b></h3></div>';

            echo '<div class="total"><h3><b>Сумма заказа ' . number_format($data['sumtotal'] + Order::PriceDelivery(), 0, '', ' ') . ' руб.</b></h3></div>';
        }elseif($order->d_method=='adres_delivery_z' OR $order->d_method == 'transport') {
            echo '<div class="total"><h3><b>Стоимость доставки оговаривается с менеджером</b></h3></div>';
        }


        echo '<br>';
        echo '<div  class="button_oformit">';
        echo Html::a('Подтвердить оформление заказа', ['basket/finaldesign'], ['class' => 'class="add_basket button1 not_link pr_btn"']
        );

        echo '</div></div>';
        ?>

    </div>