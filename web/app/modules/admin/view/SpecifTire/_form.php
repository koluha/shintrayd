<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\base\DbSpecifTire */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="db-specif-tire-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code_product')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'key_vendor')->textInput() ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'name_short')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'product_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img')->textInput() ?>

    <?= $form->field($model, 'imgs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'p_1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'p_2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'p_3')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'p_4')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'p_6')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'p_7')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'p_8')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'p_9')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'p_10')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'p_11')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'p_12')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'p_5')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
