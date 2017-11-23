<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\base\DbSpecifTire */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Спецификация шин', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="db-specif-tire-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы хотите удалить запись?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code_product',
            'vendor_key',
            'name:ntext',
            'name_short:ntext',
            'product_name:ntext',
            [
                'label' => 'Картинка',
                'format' => 'raw',
                'value' => function($data) {
                    if ($data->img) {
                        return Html::img(Url::toRoute('/img/db_tire/' . $data->img . $data->get_expansion()), [
                                    'alt' => $data->img,
                                    'style' => 'width:120px;'
                        ]);
                    }
                },
                    ],
                    [
                        'label' => 'Картинки 3 шт.',
                        'format' => 'raw',
                        'value' => function($data) {
                            $imgs = $data->arr_imgs($data->imgs);
                            $imgs_html = '';
                            if ($data->imgs) {
                                foreach ($imgs as $value) {
                                    $imgs_html.=Html::img(Url::toRoute('/img/db_tire/' . $value . $data->get_expansion()), [
                                                'alt' => $value,
                                                'style' => 'width:120px; display: inline-block; float:left;vertical-align: middle; top:0; margin-left:5px;'
                                                    ]
                                    );
                                }
                                return $imgs_html;
                            }
                        },
                                'contentOptions' => ['style' => 'width: 400px; min-width: 400px; white-space: normal;'],
                            ],
                            [
                                'attribute' => 'p_1',
                                'label' => 'Тип автомобиля',
                                'format' => 'raw',
                                'value' => function($data) {
                                    return $data->get_param($data->p_1, 1);
                                },
                            ],
                            [
                                'attribute' => 'p_2',
                                'label' => 'Сезонность',
                                'format' => 'raw',
                                'value' => function($data) {
                                    return $data->get_param($data->p_2, 2);
                                },
                            ],
                            [
                                'attribute' => 'p_3',
                                'label' => 'Ширина профиля',
                                'format' => 'raw',
                                'value' => function($data) {
                                    return $data->get_param($data->p_3, 3);
                                },
                            ],
                            [
                                'attribute' => 'p_4',
                                'label' => 'Диаметр',
                                'format' => 'raw',
                                'value' => function($data) {
                                    return $data->get_param($data->p_4, 4);
                                },
                            ],
                            [
                                'attribute' => 'p_5',
                                'label' => 'Высота профиля',
                                'format' => 'raw',
                                'value' => function($data) {
                                    return $data->get_param($data->p_5, 5);
                                },
                            ],
                            [
                                'attribute' => 'p_6',
                                'label' => 'Индекс скорости',
                                'format' => 'raw',
                                'value' => function($data) {
                                    return $data->get_param($data->p_6, 6);
                                },
                            ],
                            [
                                'attribute' => 'p_7',
                                'label' => 'Индекс нагрузки',
                                'format' => 'raw',
                                'value' => function($data) {
                                    return $data->get_param($data->p_7, 7);
                                },
                            ],
                            [
                                'attribute' => 'p_8',
                                'label' => 'Способ герметизации',
                                'format' => 'raw',
                                'value' => function($data) {
                                    return $data->get_param($data->p_8, 8);
                                },
                            ],
                            [
                                'attribute' => 'p_9',
                                'label' => 'Конструкция',
                                'format' => 'raw',
                                'value' => function($data) {
                                    return $data->get_param($data->p_9, 9);
                                },
                            ],
                            [
                                'attribute' => 'p_10',
                                'label' => 'Технология RunFlat',
                                'format' => 'raw',
                                'value' => function($data) {
                                    return $data->get_param($data->p_10, 10);
                                },
                            ],
                            [
                                'attribute' => 'p_11',
                                'label' => 'Шипы',
                                'format' => 'raw',
                                'value' => function($data) {
                                    return $data->get_param($data->p_11, 11);
                                },
                            ],
                            [
                                'attribute' => 'p_12',
                                'label' => 'Доп. информация',
                                'format' => 'raw',
                                'value' => function($data) {
                                    return $data->get_param($data->p_12, 12);
                                },
                            ],
                        ],
                    ])
                    ?>

</div>
