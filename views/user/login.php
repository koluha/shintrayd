<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = 'Авторизация';
?>

<div class="block_breadcrumbs">
    <?php
    echo Breadcrumbs::widget([
        'homeLink' => ['label' => 'Главная', 'url' => '/'],
        'links' => ['Авторизация'],
    ]);
    ?>
</div>
<div class="container">  
    <div class="row">
        <p>Для совершения покупок, пожалуйста авторизуйтесь,или пройдите <a href="<?php echo Url::toRoute('user/registration'); ?>">регистрацию</a> най сайте. </p>
        <div class="width_200">
            <?php $form = ActiveForm::begin(); ?>
            <h2>Авторизация</h2>
            <?= $form->field($model, 'username') ?>
            <?= $form->field($model, 'password')->passwordInput(); ?>
            <?= $form->field($model, 'rememberMe')->checkbox(); ?>
            <?= $form->field($model, 'service_field')->hiddenInput()->label(false); ?>
            <div class="form-group">
                <?= Html::submitButton('Вход', ['class' => 'btn btn-primary']); ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div> 
    </div> 
</div>