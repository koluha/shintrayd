<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\TbNomenclature */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tb Nomenclatures';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-nomenclature-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tb Nomenclature', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pid',
            'nomenclature',
            'product_code',
            'b2b_price:ntext',
            // 'petail_price:ntext',
            // 'min_price:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
