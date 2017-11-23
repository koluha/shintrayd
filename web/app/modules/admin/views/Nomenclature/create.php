<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TbNomenclature */

$this->title = 'Create Tb Nomenclature';
$this->params['breadcrumbs'][] = ['label' => 'Tb Nomenclatures', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-nomenclature-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
