<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php 

$form = ActiveForm::begin(); 

?>
<?= $form->field($model, 'username') ?>
<?= $form->field($model, 'password') ?>

<div class="form-group">
<?= Html::submitButton('Вход', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>