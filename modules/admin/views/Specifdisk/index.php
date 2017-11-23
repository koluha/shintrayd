<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use app\models\base\DbSpecifDisk;
use app\models\base\SpecifDiskHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SpecifDisk */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Спецификация колесных дисков';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="db-specif-disk-index">
    <h1><?= Html::encode($this->title) ?></h1>
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
            return $data->getVendorindisk($data->vendor_key);
        },
                'filter' => DbSpecifDisk::getVendorindisk_all(),
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
                'filter' => SpecifDiskHelper::P_1,
            ],
            [
                'attribute' => 'p_2',
                'label' => 'Диаметр центрального отверстия',
                'format' => 'raw',
                'value' => function($data) {
            return $data->get_param($data->p_2, 2);
        },
                'filter' => SpecifDiskHelper::P_2,
            ],
            [
                'attribute' => 'p_3',
                'label' => 'Вылет (ET)',
                'format' => 'raw',
                'value' => function($data) {
            return $data->get_param($data->p_3, 3);
        },
                'filter' => SpecifDiskHelper::P_3,
            ],
            [
                'attribute' => 'p_4',
                'label' => 'Диаметр расположения отверстий (PCD)',
                'format' => 'raw',
                'value' => function($data) {
            return $data->get_param($data->p_4, 4);
        },
                'filter' => SpecifDiskHelper::P_4,
            ],
            [
                'attribute' => 'p_5',
                'label' => 'Вес',
                'format' => 'raw',
                'value' => function($data) {
            return $data->get_param($data->p_5, 5);
        },
                'filter' => SpecifDiskHelper::P_5,
            ],
            [
                'attribute' => 'p_6',
                'label' => 'Ширина обода',
                'format' => 'raw',
                'value' => function($data) {
            return $data->get_param($data->p_6, 6);
        },
                'filter' => SpecifDiskHelper::P_6,
            ],
            [
                'attribute' => 'p_7',
                'label' => 'Диаметр обода',
                'format' => 'raw',
                'value' => function($data) {
            return $data->get_param($data->p_7, 7);
        },
                'filter' => SpecifDiskHelper::P_7,
            ],
            [
                'attribute' => 'p_8',
                'label' => 'Тип',
                'format' => 'raw',
                'value' => function($data) {
            return $data->get_param($data->p_8, 8);
        },
                'filter' => SpecifDiskHelper::P_8,
            ],
            [
                'attribute' => 'p_9',
                'label' => 'Материал',
                'format' => 'raw',
                'value' => function($data) {
            return $data->get_param($data->p_9, 9);
        },
                'filter' => SpecifDiskHelper::P_9,
            ],
            [
                'attribute' => 'p_10',
                'label' => 'Цвет',
                'format' => 'raw',
                'value' => function($data) {
            return $data->get_param($data->p_10, 10);
        },
                'filter' => false,
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>

