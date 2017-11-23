<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DbSpecifDisk */

$this->title = 'Создание спецификации диска';
$this->params['breadcrumbs'][] = ['label' => 'Спецификация диска', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="db-specif-disk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
