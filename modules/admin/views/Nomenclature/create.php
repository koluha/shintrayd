<?php

use yii\helpers\Html;

$this->title = 'Создать номенклатуру';
$this->params['breadcrumbs'][] = ['label' => 'Номентклатура', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-nomenclature-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
