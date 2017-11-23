<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Спецификация дисков', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="db-specif-disk-view">

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
            [
                'attribute' => 'code_product',
                'label' => 'Код товара',
                'format' => 'raw',
            ],
            [
                'attribute' => 'vendor_key',
                'label' => 'Производитель',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->getVendorindisk($data->vendor_key);
                },
            ],
            'name:ntext',
            'name_short:ntext',
            'product_name:ntext',
            [
                'label' => 'Картинка',
                'format' => 'raw',
                'value' => function($data) {
                    if ($data->img) {
                        return Html::img(Url::toRoute('/img/db_disk/' . $data->img . $data->get_expansion()), [
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
                                    $imgs_html.=Html::img(Url::toRoute('/img/db_disk/' . $value . $data->get_expansion()), [
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
                                'label' => 'Количество крепежных отверстий',
                                'format' => 'raw',
                                'value' => function($data) {
                                    return $data->get_param($data->p_1, 1);
                                },
                            ],
                            [
                                'attribute' => 'p_2',
                                'label' => 'Диаметр центрального отверстия',
                                'format' => 'raw',
                                'value' => function($data) {
                                    return $data->get_param($data->p_2, 2);
                                },
                            ],
                            [
                                'attribute' => 'p_3',
                                'label' => 'Вылет (ET)',
                                'format' => 'raw',
                                'value' => function($data) {
                                    return $data->get_param($data->p_3, 3);
                                },
                            ],
                            [
                                'attribute' => 'p_4',
                                'label' => 'Диаметр расположения отверстий (PCD)',
                                'format' => 'raw',
                                'value' => function($data) {
                                    return $data->get_param($data->p_4, 4);
                                },
                            ],
                            [
                                'attribute' => 'p_5',
                                'label' => 'Вес',
                                'format' => 'raw',
                                'value' => function($data) {
                                    return $data->get_param($data->p_5, 5);
                                },
                            ],
                            [
                                'attribute' => 'p_6',
                                'label' => 'Ширина обода',
                                'format' => 'raw',
                                'value' => function($data) {
                                    return $data->get_param($data->p_6, 6);
                                },
                            ],
                            [
                                'attribute' => 'p_7',
                                'label' => 'Диаметр обода',
                                'format' => 'raw',
                                'value' => function($data) {
                                    return $data->get_param($data->p_7, 7);
                                },
                            ],
                            [
                                'attribute' => 'p_8',
                                'label' => 'Тип',
                                'format' => 'raw',
                                'value' => function($data) {
                                    return $data->get_param($data->p_8, 8);
                                },
                            ],
                            [
                                'attribute' => 'p_9',
                                'label' => 'Материал',
                                'format' => 'raw',
                                'value' => function($data) {
                                    return $data->get_param($data->p_9, 9);
                                },
                            ],
                            [
                                'attribute' => 'p_10',
                                'label' => 'Цвет',
                                'format' => 'raw',
                                'value' => function($data) {
                                    return $data->get_param($data->p_10, 10);
                                },
                            ],
                        ],
                    ])
                    ?>

</div>
