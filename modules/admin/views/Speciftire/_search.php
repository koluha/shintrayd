<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\SpecifTire */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="db-specif-tire-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'code_product') ?>

    <?= $form->field($model, 'key_vendor') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'name_short') ?>

    <?php // echo $form->field($model, 'product_name') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'imgs') ?>

    <?php // echo $form->field($model, 'p_1') ?>

    <?php // echo $form->field($model, 'p_2') ?>

    <?php // echo $form->field($model, 'p_3') ?>

    <?php // echo $form->field($model, 'p_4') ?>

    <?php // echo $form->field($model, 'p_6') ?>

    <?php // echo $form->field($model, 'p_7') ?>

    <?php // echo $form->field($model, 'p_8') ?>

    <?php // echo $form->field($model, 'p_9') ?>

    <?php // echo $form->field($model, 'p_10') ?>

    <?php // echo $form->field($model, 'p_11') ?>

    <?php // echo $form->field($model, 'p_12') ?>

    <?php // echo $form->field($model, 'p_5') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
