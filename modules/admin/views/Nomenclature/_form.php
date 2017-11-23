<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\base\TbNomenclature;

$model_nomen = new TbNomenclature;


?>

<div class="tb-nomenclature-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pid')->dropDownList($model_nomen->all_price(), ['prompt' => 'Выберите прайс...'])->label($model->isNewRecord ? 'Добавить' : 'Изменить') ?>

    <?= $form->field($model, 'nomenclature')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'b2b_price')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'petail_price')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'min_price')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
