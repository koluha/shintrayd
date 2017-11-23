<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\Pjax;

$this->title = 'История заказов';
$this->params['breadcrumbs'][] = 'История заказов';

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
        'links' => ['История заказов'],
    ]);
    ?>
</div>
<div class="container">
    <div class="row">
        <h1>История заказов</h1>
        <?php echo '<div id="order_list">
    <table id="lot">
        <tr>
            <th width="100">Картинка</th>
            <th width="100">№ заказа</th> 
             <th width="100">Статус</th>
            <th width="190">Наименование</th>
            <th width="80">Размер</th>
            <th width="80" class="cost">Кол-во</th>
            <th width="80" class="cost">Цена</th>
            <th width="80" class="cost">Сумма</th>
        </tr>' ?>


        <?php
        foreach ($data as $data) {
            echo '<tr>';
            if ($data['type'] == 'tyre') {
                $tyre = 'Шина';
            } elseif ($data['type'] == 'disk') {
                $tyre = 'Диск';
            }
            echo '<td>' . $tyre . '</td>';
            echo '</tr>';
       
            echo '<tr>';
            $ded = $data['size'];
            $size = explode("|", $ded);
            echo '<td>' . '' . '</td>';
                   echo '<td>' . $data['id_order'] . '</td>';
                    echo '<td>' . $data['status'] . '</td>';
            echo '<td><b>' . $data['brand'] . '</b><br><b>' . $data['model'] . '</b><br>' . $size[1] . '<br>Артикул: ' . $data['article'] . ' </td>';
            echo '<td>' . $size[0] . '</td>';

            echo '<td><b>' . $data['count'] . '</b></td>';


            echo '<td class="cost">' . number_format($data['price'], 0, '', ' ') . ' руб.</td>';
            echo '<td class="cost">' . number_format($data['count'] * $data['price'], 0, '', ' ') . ' руб.</td>';

            echo '</tr>';
        }
//  echo '</div>';

        echo '</table>';
        ?>
    </div>
</div>

