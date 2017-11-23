<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\TbNomenclature */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-nomenclature-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pid') ?>

    <?= $form->field($model, 'nomenclature') ?>

    <?= $form->field($model, 'product_code') ?>

    <?= $form->field($model, 'b2b_price') ?>

    <?php // echo $form->field($model, 'petail_price') ?>

    <?php // echo $form->field($model, 'min_price') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
