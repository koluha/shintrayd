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
            'attribute' => 'username',
            'label' => 'Логин покупателя',
            'format' => 'raw',
            'value' => function($data) {
                return $data['username'];
            },
        ],
        [
            'attribute' => 'fio',
            'label' => 'Имя, фамилия',
            'format' => 'raw',
            'value' => function($data) {
                return $data['fio'];
            },
        ],
        [
            'attribute' => 'phone',
            'label' => 'Контактный телефон',
            'format' => 'raw',
            'value' => function($data) {
                return $data['phone'];
            },
        ],
        [
            'attribute' => 'email',
            'label' => 'Email',
            'format' => 'raw',
            'value' => function($data) {
                 return $data['email'];
            },
        ],
        [
            'attribute' => 'date',
            'label' => 'Дата регистрации на сайте',
            'format' => 'raw',
            'value' => function($data) {
                return $data['date'];
            },
        ],
        [
            'attribute' => 'delivery',
            'label' => 'Доставка указанная при регистрации',
            'format' => 'raw',
            'value' => function($data) {
                return $data['delivery'];
            },
        ],

    ],
]);
 