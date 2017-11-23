<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\base\DbSpecifTire */

$this->title = 'Create Db Specif Tire';
$this->params['breadcrumbs'][] = ['label' => 'Db Specif Tires', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="db-specif-tire-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
