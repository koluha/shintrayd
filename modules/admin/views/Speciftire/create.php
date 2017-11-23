<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\base\DbSpecifTire */

$this->title = 'Создание спецификации шин';
$this->params['breadcrumbs'][] = ['label' => 'Спецификация шин', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="db-specif-tire-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
