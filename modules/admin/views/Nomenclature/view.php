<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Номенктарура', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-nomenclature-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
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
                'attribute' => 'pid',
                'label' => 'Производитель',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->getprice_id($data->pid);
                },
            ],
            'nomenclature',
            'product_code',
            'b2b_price:ntext',
            'petail_price:ntext',
            'min_price:ntext',
        ],
    ])
    ?>

</div>
