<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use app\models\Basket;
use yii\widgets\Breadcrumbs;
?>
<?php
echo Breadcrumbs::widget([
    'homeLink' => ['label' => 'Главная', 'url' => '/admin'],
    'links' => [
        [ 'label' => 'Заказы',
            'url' => ['/admin/order/index'],
        ],
        ucfirst(strtolower('Данные покупателя')),
    ],
]);



echo GridView::widget([
    'dataProvider' => $provider,
    'columns' => [
        [
            'attribute' => 'id_order',
            'label' => 'Заказ №',
            'format' => 'raw',
            'value' => function($data) {
                return $data['id_order'];
            },
        ],
        [
            'attribute' => 'username',
            'label' => 'Логин покупателя',
            'format' => 'raw',
            'value' => function($data) {
                return $data['username'];
            },
        ],
        [
            'attribute' => 'type',
            'label' => 'Тип продукта',
            'format' => 'raw',
            'value' => function($data) {
                if ($data['type'] == 'tyre') {
                    return 'Шина';
                } elseif ($data['type'] == 'disk') {
                    return 'Диск';
                }
            },
        ],
        [
            'attribute' => 'article',
            'label' => 'Артикл',
            'format' => 'raw',
            'value' => function($data) {
                return $data['article'];
            },
        ],
        [
            'attribute' => 'name_product',
            'label' => 'Наименование продукта',
            'format' => 'raw',
            'value' => function($data) {
                return $data['name_product'];
            },
        ],
        [
            'attribute' => 'brand',
            'label' => 'Бренд',
            'format' => 'raw',
            'value' => function($data) {
                return $data['brand'];
            },
        ],
        [
            'attribute' => 'model',
            'label' => 'Модель',
            'format' => 'raw',
            'value' => function($data) {
                return $data['model'];
            },
        ],
        [
            'attribute' => 'size',
            'label' => 'Размер',
            'format' => 'raw',
            'value' => function($data) {
                return $data['size'];
            },
        ],
        [
            'attribute' => 'count',
            'label' => 'Кол-во',
            'format' => 'raw',
            'value' => function($data) {
                return $data['count'];
            },
        ],
        [
            'attribute' => 'status',
            'label' => 'Статус',
            'format' => 'raw',
            'value' => function($data) {
                return $data['status'];
            },
        ],
        [
            'attribute' => 'price',
            'label' => 'Цена',
            'format' => 'raw',
            'value' => function($data) {
                return $data['price'];
            },
        ],
    ],
]);
?>       
<h2>Сумма заказа <?= number_format($sum, 0, '', ' ') ?> руб.</h2>
<?php
if ($p_price) {
    echo "<h2>Цена за доставку $p_price руб.</h2>";
}


$total = $total + (($p_price) ? $p_price : 0);



echo "<h2>Всего " . number_format($total, 0, '', ' ') . " руб.</h2>";
?>
            
