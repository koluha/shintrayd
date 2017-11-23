<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = 'Каталог колесных дисков';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="block_breadcrumbs">
    <?php
    echo Breadcrumbs::widget([
        'homeLink' => ['label' => 'Главная', 'url' => '/'],
        'links' => ['Каталог колесных дисков'],
    ]);
    ?>
</div>

<div class="col-xs-3">
    <?= $this->render('_left_form_disk') ?>
</div>   
<div class="col-xs-9">
      <h1>Каталог Колесных дисков</h2>
       <?php
        foreach ($data as $value) {
            echo '<ul class="catalog_base">';
            echo '<li>';
            echo '<div class="catalog-it">';
            echo Html::a(ucfirst(strtolower($value['manufacturer'])), ['/disk', 'brand' => $value['link_manufacturer']], ['class' => 'cat-link_1']);
            $url_img=strtr(strtolower($value['manufacturer']), " ", "_");
            echo Html::a(Html::img('/img/brands_disk/'.$url_img.'.jpg', [ 'height' => '42']), ['/disk', 'brand' => $value['link_manufacturer']], ['class' => 'cat-link_2']);
            echo '</div>';
            echo '</li>';
            echo '</ul>';
        }
        ?>
</div>



