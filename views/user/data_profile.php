<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = 'Профиль';
$this->params['breadcrumbs'][] = 'Профиль';
?>

<div class="block_breadcrumbs">
    <?php
    echo Breadcrumbs::widget([
        'homeLink' => ['label' => 'Главная', 'url' => '/'],
        'links' => ['Профиль'],
    ]);
    ?>
</div>
<div class="container">  
    <div class="row">

        <div class="width_200">
<?php $form = ActiveForm::begin(); ?>
            <h3>Изменить данные</h3><br><br>
            <p><b>Регистрационные данные:</b></p>
            <?= $form->field($model, 'username'); ?>
            <?= $form->field($model, 'password')->passwordInput(); ?>
            <?= $form->field($model, 'password_')->passwordInput(); ?>
            <br><br><p><b>Контактные данные:</b></p>
            <?= $form->field($model, 'fio'); ?> 
            <?= $form->field($model, 'email'); ?>
            <?= $form->field($model, 'phone'); ?>
            <br><br><p><b>Данные о доставке:</b></p>
                <?= $form->field($model, 'delivery')->textarea(); ?>
            <div class="form-group">
<?= Html::submitButton('Изменить', ['class' => 'btn btn-primary']); ?>
            </div>

<?php ActiveForm::end(); ?>

        </div> 
    </div> 
</div>