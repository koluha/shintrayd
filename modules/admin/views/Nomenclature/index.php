<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\base\TbNomenclature;

$this->title = 'Номенклатура';
$this->params['breadcrumbs'][] = $this->title;


$model_nomen = new TbNomenclature;
?>
<div class="tb-nomenclature-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a('Создать номенклатуру', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ''],
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'product_code',
                'label' => 'Код товара',
                'format' => 'raw',
            ],
            [
                'attribute' => 'in',
                'label' => 'База',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->in_base($data->product_code, $data->id,$data->in);
                },
            ],
            [
                'attribute' => 'pid',
                'label' => 'Прайс',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->getprice_id($data->pid);
                },
                'filter' => $model_nomen->all_price(),
                'contentOptions' => ['style' => 'width: 150px; min-width: 150px; white-space: normal;'],
            ],
            'nomenclature',
            'b2b_price:ntext',
            'petail_price:ntext',
            'min_price:ntext',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
