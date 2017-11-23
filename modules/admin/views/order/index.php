<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use app\models\Basket;

?>
<?php

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;

echo GridView::widget([
    'dataProvider' => $provider,
    'columns' => [

        [
            'attribute' => 'key_order',
            'label' => 'Заказ №',
            'format' => 'raw',
            'value' => function($data) {
                return Html::a($data['key_order'], ['order/list',
                            'id_user' => $data['id_user'],
                            'id_order' => $data['key_order']
                ]);
            },
                ],
                [
                    'attribute' => 'date',
                    'label' => 'Дата оформления заказа.',
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data['date'];
                    },
                ],
                [
                    'attribute' => 'order_status',
                    'label' => 'Статус заказу',
                    'format' => 'raw',
                    'value' => function($data) {
                        return $data['order_status'];
                    },
                ],
                [
                    'attribute' => 'id_user',
                    'label' => 'Данные покупателя',
                    'format' => 'raw',
                    'value' => function($data) {
                        return Html::a($data['id_user'], ['order/user',
                                    'id_user' => $data['id_user']
                        ]);
                    },
                        ],
                        [
                            'attribute' => 'd_method',
                            'label' => 'Способ доставки',
                            'format' => 'raw',
                            'value' => function($data) {
                                return Basket::getd_method($data['d_method']);
                            },
                        ],
                        [
                            'attribute' => 'd_cash_method',
                            'label' => 'Способ оплаты',
                            'format' => 'raw',
                            'value' => function($data) {
                                return Basket::getpay_method($data['d_cash_method']);
                            },
                        ],
                        [
                            'attribute' => 'd_address',
                            'label' => 'Адрес доставки',
                            'format' => 'raw',
                            'value' => function($data) {
                                return $data['d_address'];
                            },
                        ],
                        [
                            'attribute' => 'd_comments',
                            'label' => 'Комментарий к заказу',
                            'format' => 'raw',
                            'value' => function($data) {
                                return $data['d_comments'];
                            },
                        ],
                        [
                            'attribute' => 'd_date',
                            'label' => 'Дата доставки',
                            'format' => 'raw',
                            'value' => function($data) {
                                return $data['d_date'];
                            },
                        ],
                        [
                            'attribute' => 'd_price',
                            'label' => 'Цена за доставку руб.',
                            'format' => 'raw',
                            'value' => function($data) {
                                return $data['d_price'];
                            },
                        ],
                    ],
                ]);
?>