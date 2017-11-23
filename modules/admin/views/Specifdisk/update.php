<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DbSpecifDisk */

$this->title = 'Редактирование спецификации дисков: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Спецификация дисков', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="db-specif-disk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
