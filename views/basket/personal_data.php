<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\jui\DatePicker;

$this->title = 'Персональные данные';
$this->params['breadcrumbs'][] = 'Персональные данные';
?>

<div class="block_breadcrumbs">
    <?php
    echo Breadcrumbs::widget([
        'homeLink' => ['label' => 'Главная', 'url' => '/'],
        'links' => [
            [ 'label' => Корзина,
                'url' => ['basket/index'],
            ],
            ucfirst(strtolower('Персональные данные')),
        ],
    ]);
    ?>
</div>
<div class="container">  
    <div class="row">
        <div class="link_basket">
            <div class="col-xs-3 item "><?php echo Html::a('1. Корзина', ['basket/index'], ['class' => '']); ?></div>
            <div class="col-xs-3 item "><?php echo Html::a('2. Доставка и оплата', ['basket/deliverypayment'], ['class' => 'class=""']); ?></div>
            <div class="col-xs-3 item active1"><?php echo Html::a('3. Ваши персональные данные', ['basket/personaldata'], ['class' => 'class=""']); ?></div>
            <div class="col-xs-3 item ">4. Подтвержение заказа</div>
        </div>
    </div>

    <div class="row">
        <h1>3. Ваши персональные данные</h1>
        <div class="col-xs-4">
            <div class="width_200">

                <?php
                
                //Если НЕ авторизированный пользователь
                //   if (Yii::$app->user->isGuest) {
                $form_reg = ActiveForm::begin();
                ?>
                <?= $form_reg->field($model_reg, 'fio'); ?> 
                <?= $form_reg->field($model_reg, 'email'); ?>
                <?= $form_reg->field($model_reg, 'phone'); ?>
                <?= $form_reg->field($model_reg, 'service_field')->hiddenInput()->label(false); ?>
                <div class="form-group">
                    <?= Html::submitButton('Подтвердить', ['class' => 'btn btn-primary']); ?>
                </div>

                <?php
                ActiveForm::end();
                //  }
                ?>

                <?php
                //Если авторизированный пользователь
                /*
                 * if (!Yii::$app->user->isGuest) {
                  $form_reg = ActiveForm::begin();
                  ?>
                  <?= '<label class="control-label" for="reguserform-username">Логин</label>' ?>
                  <?= '<div>' . $model_reg->username . '</div><br>' ?>

                  <?= $form_reg->field($model_reg, 'fio'); ?>
                  <?= $form_reg->field($model_reg, 'email'); ?>
                  <?= $form_reg->field($model_reg, 'phone'); ?>
                  <?= $form_reg->field($model_reg, 'service_field')->hiddenInput()->label(false); ?>
                  <div class="form-group">
                  <?= Html::submitButton('Продолжить оформление', ['class' => 'btn btn-primary']); ?>
                  </div>

                  <?php
                  ActiveForm::end();
                  }
                 */
                ?>



            </div>
        </div> 
        <div class="col-xs-4">       
            <div class="width_200">
                <?php
                //Если НЕ авторизированный пользователь
              /*  if (Yii::$app->user->isGuest) {
                    $form_login = ActiveForm::begin();
                    echo '<h2>Авторизация</h2>';
                    echo $form_login->field($model_log, 'username');
                    echo $form_login->field($model_log, 'password')->passwordInput();
                    echo $form_login->field($model_log, 'rememberMe')->checkbox();
                    echo $form_login->field($model_log, 'service_field')->hiddenInput()->label(false);
                    echo '<div class = "form-group">';
                    echo Html::submitButton('Вход', ['class' => 'btn btn-primary']);
                    echo '</div>';
                    ActiveForm::end();
                }
               * 
               */
                
                ?>


            </div> 
        </div>
        <div class="col-xs-4"></div>
    </div>