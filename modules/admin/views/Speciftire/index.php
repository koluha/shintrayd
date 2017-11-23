<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use app\models\base\DbSpecifTire;
use app\models\base\SpecifTireHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SpecifTire */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Спецификация шин';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="db-specif-tire-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать новую спецификацию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'code_product',
                'label' => 'Код товара',
                'format' => 'raw',
                'value' => function($data) {
            return $data->code_product;
        },
            ],
            [
                'attribute' => 'vendor_key',
                'label' => 'Производитель',
                'format' => 'raw',
                'value' => function($data) {
            return $data->getVendorintire($data->vendor_key);
        },
                'filter' => DbSpecifTire::getVendorintire_all(),
                'contentOptions' => ['style' => 'width: 150px; min-width: 150px; white-space: normal;'],
            ],
            [
                'attribute' => 'name',
                'label' => 'Наименование',
                'format' => 'raw',
                'value' => function($data) {
            return $data->name;
        },
            ],
            [
                'attribute' => 'name_short',
                'label' => 'Наименование сокращенное',
                'format' => 'raw',
                'value' => function($data) {
            return $data->name_short;
        },
            ],
            [
                'attribute' => 'product_name',
                'label' => 'Наименование продукта',
                'format' => 'raw',
                'value' => function($data) {
            return $data->product_name;
        },
            ],
                
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
                'filter' => false,
            ],
            [
                'attribute' => 'p_2',
                'label' => 'Сезонность',
                'format' => 'raw',
                'value' => function($data) {
            return $data->get_param($data->p_2, 2);
        },
                'filter' => SpecifTireHelper::P_2,
            ],
            [
                'attribute' => 'p_3',
                'label' => 'Ширина профиля',
                'format' => 'raw',
                'value' => function($data) {
            return $data->get_param($data->p_3, 3);
        },
                'filter' => SpecifTireHelper::P_3,
            ],
            [
                'attribute' => 'p_4',
                'label' => 'Диаметр',
                'format' => 'raw',
                'value' => function($data) {
            return $data->get_param($data->p_4, 4);
        },
                'filter' => SpecifTireHelper::P_4,
            ],
            [
                'attribute' => 'p_5',
                'label' => 'Высота профиля',
                'format' => 'raw',
                'value' => function($data) {
            return $data->get_param($data->p_5, 5);
        },
                'filter' => SpecifTireHelper::P_5,
            ],
            [
                'attribute' => 'p_6',
                'label' => 'Индекс скорости',
                'format' => 'raw',
                'value' => function($data) {
            return $data->get_param($data->p_6, 6);
        },
                'filter' => false,
            ],
            [
                'attribute' => 'p_7',
                'label' => 'Индекс нагрузки',
                'format' => 'raw',
                'value' => function($data) {
            return $data->get_param($data->p_7, 7);
        },
                'filter' => false,
            ],
            [
                'attribute' => 'p_8',
                'label' => 'Способ герметизации',
                'format' => 'raw',
                'value' => function($data) {
            return $data->get_param($data->p_8, 8);
        },
                'filter' => false,
            ],
            [
                'attribute' => 'p_9',
                'label' => 'Конструкция',
                'format' => 'raw',
                'value' => function($data) {
            return $data->get_param($data->p_9, 9);
        },
                'filter' => false,
            ],
            [
                'attribute' => 'p_10',
                'label' => 'Технология RunFlat',
                'format' => 'raw',
                'value' => function($data) {
            return $data->get_param($data->p_10, 10);
        },
                'filter' => SpecifTireHelper::P_10,
            ],
            [
                'attribute' => 'p_11',
                'label' => 'Шипы',
                'format' => 'raw',
                'value' => function($data) {
            return $data->get_param($data->p_11, 11);
        },
                'filter' => SpecifTireHelper::P_11,
            ],
            [
                'attribute' => 'p_12',
                'label' => 'Доп. информация',
                'format' => 'raw',
                'value' => function($data) {
            return $data->get_param($data->p_12, 12);
        },
                'filter' => false,
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
