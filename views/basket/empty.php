<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = 'Корзина';
$this->params['breadcrumbs'][] = 'Корзина';
?>

<div class="block_breadcrumbs">
    <?php
    echo Breadcrumbs::widget([
        'homeLink' => ['label' => 'Главная', 'url' => '/'],
        'links' => ['Корзина'],
    ]);
    ?>
</div>
<div class="container">  
    <div class="row">

        <h1>Корзина</h1>
        <h3>Ваша корзина пуста</h3>
    </div>
</div>