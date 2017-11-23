<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SpecifTire */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Db Specif Tires';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="db-specif-tire-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Db Specif Tire', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'code_product',
            'key_vendor',
            'name:ntext',
            'name_short:ntext',
            // 'product_name:ntext',
            // 'img',
            // 'imgs',
            // 'p_1:ntext',
            // 'p_2:ntext',
            // 'p_3:ntext',
            // 'p_4:ntext',
            // 'p_6:ntext',
            // 'p_7:ntext',
            // 'p_8:ntext',
            // 'p_9:ntext',
            // 'p_10:ntext',
            // 'p_11:ntext',
            // 'p_12:ntext',
            // 'p_5:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
