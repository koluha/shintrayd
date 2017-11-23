<?php

use yii\helpers\Html;

$this->title = 'Ошибка результата';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?php
        echo $title;
        ?>
    </p>
</div>
