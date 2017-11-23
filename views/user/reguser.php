<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = 'Регистрация пользователя';
$this->params['breadcrumbs'][] = 'Регистрация пользователя';
?>

<div class="block_breadcrumbs">
    <?php
    echo Breadcrumbs::widget([
        'homeLink' => ['label' => 'Главная', 'url' => '/'],
        'links' => ['Регистрация пользователя'],
    ]);
    ?>
</div>
<div class="container">  
    <div class="row">
        <p>Для совершения покупок, пожалуйста зарегистрируйтесь,или <a href="<?php echo Url::toRoute('user/login'); ?>">авторизуйтесь</a> под своим логином. </p>
        <div class="width_200">
            <?php $form = ActiveForm::begin(); ?>
            <h2>Регистрация</h2>
            <?= $form->field($model, 'username'); ?>
            <?= $form->field($model, 'password')->passwordInput(); ?>
            <?= $form->field($model, 'password_')->passwordInput(); ?>
            <?= $form->field($model, 'fio'); ?> 
            <?= $form->field($model, 'email'); ?>
                <?= $form->field($model, 'phone'); ?>
            <div class="form-group">
<?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary']); ?>
            </div>

<?php ActiveForm::end(); ?>

        </div> 
    </div> 
</div>