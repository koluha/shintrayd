<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = 'Ремонт дисков';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block_breadcrumbs">
    <?php
    echo Breadcrumbs::widget([
        'homeLink' => ['label' => 'Главная', 'url' => '/'],
        'links' => ['Ремонт дисков'],
    ]);
    ?>
</div>
<div class="container">
    <div class="row">
        <div class="site-about">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>
            Страница в стадии наполнения
            </p>

        </div>
    </div>
</div>