<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TbNomenclature */

$this->title = 'Update Tb Nomenclature: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tb Nomenclatures', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-nomenclature-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
