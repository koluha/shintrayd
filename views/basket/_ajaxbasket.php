<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\Pjax;
use app\models\base\Tyre;

$this->title = 'Корзина';
$this->params['breadcrumbs'][] = 'Корзина';

/*
 * Если же вы не хотите, чтобы все ссылки осуществляли pjax запрос, 
 * то следует исключаемым ссылкам добавить атрибут data-pjax=0. 
 * Например так:

  <?= \yii\helpers\Html::a(Yii::t('app', 'подробнее...'), ['car/view', 'id' => $car->id], ['data-pjax'=>0]) ?>
 */
?>

<div class="block_breadcrumbs">
    <?php
    echo Breadcrumbs::widget([
        'homeLink' => ['label' => 'Главная', 'url' => '/'],
        'links' => ['Корзина'],
    ]);
    ?>
</div>
<div class="container">  
    <div class="row">
        <div class="link_basket">
            <div class="col-xs-3 item active1"><?php echo Html::a('1. Корзина', ['basket/index'], ['class' => '']); ?></div>
            <div class="col-xs-3 item ">2. Доставка и оплата</div>
            <div class="col-xs-3 item">3. Ваши персональные данные</div>
            <div class="col-xs-3 item">4. Подтвержение заказа</div>
        </div>
    </div>

    <div class="row">
        <?php Pjax::begin(['enablePushState' => false]); ?>
        <?php echo '<div id="cart">
    <table id="lot">
        <h1>Корзина</h1>
        <tr>
            <th width="100"></th>
            <th width="190">Наименование</th>
            <th width="80">Размер</th>
            <th width="80" class="cost">Кол-во</th>
            <th width="80" class="cost">Цена</th>
            <th width="80" class="cost">Сумма</th>
            <th width="80">Удалить</th>
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

            echo '<td class="cost"><div class="amound_cart"><div class="amound_sel">'
            . Html::a(Html::img('/img/icons/minus.png'), ['basket/subtraction', 'id' => $cart['id'],
                'article' => $cart['article'],
                'brand' => $cart['brand'],
                'type' => $cart['type']]) .
            '</div>
                                    <input  type="text" name="in" value="' . $cart['count'] . '"  readonly="readonly" />
      <div class="amound_sel ">' . Html::a(Html::img('/img/icons/plus.png'), ['basket/addition', 'id' => $cart['id'],
                'article' => $cart['article'],
                'brand' => $cart['brand'],
                'type' => $cart['type']]) . '</div>';


            echo '<td class="cost">' . number_format($cart['price'], 0, '', ' ') . ' руб.</td>';
            echo '<td class="cost">' . number_format($cart['count'] * $cart['price'], 0, '', ' ') . ' руб.</td>';

            echo '<td class="cost">';
            // echo CHtml::Link(CHtml::image('/img/icons/del.png', 'Удалить'), array('/basket/delcartitem', 'id_cart_context' => $cart['id']));

            echo Html::a(Html::img('/img/icons/del.png'), ['basket/delete',
                'id' => $cart['id'],
                'article' => $cart['article'],
                'brand' => $cart['brand'],
                'type' => $cart['type']]);
            echo '</td>';
            echo '</tr>';
        }
        //  echo '</div>';

        echo '</table>';
        echo '<br>';
        echo '<div class="total"><h3><b>Сумма заказа ' . number_format($data['sumtotal'], 0, '', ' ') . ' руб.</b></h3></div>';



        echo '<br>';
        echo '<div  class="button_oformit">';
        echo Html::a('Продолжить оформление заказа', ['basket/deliverypayment'], ['class' => 'class="add_basket button1 not_link pr_btn"']
        );

        echo '</div></div>';
        Pjax::end();
        ?>
    </div>
</div>