<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = 'Каталог колесных дисков, производители колесных дисков';
$meta_description = $this->title;
$meta_keywords = 'каталог колесных дисков';

$this->params['breadcrumbs'][] = 'Каталог колесных дисков по производителю';

$this->title = $this->title ? $this->title : Yii::$app->params['meta_title'];

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $meta_keywords ? $meta_keywords : Yii::$app->params['meta_keywords'],
]);
$this->registerMetaTag([
    'name' => 'description',
    'content' => $meta_description ? $meta_description : Yii::$app->params['meta_description'],
]);
?>

<div class="block_breadcrumbs">
    <?php
    echo Breadcrumbs::widget([
        'homeLink' => ['label' => 'Главная', 'url' => '/'],
        'links' => ['Каталог колесных дисков по производителю'],
    ]);
    ?>
</div>

<div class="col-xs-3">
    <?= $this->render('_left_form_disk') ?>
</div>   
<div class="col-xs-9">
      <h1>Каталог колесных дисков</h2>
       <?php
        foreach ($data as $value) {
            echo '<ul class="catalog_base">';
            echo '<li>';
            echo '<div class="catalog-it">';
            echo Html::a(ucfirst(strtolower($value['manufacturer'])), ['disk/index', 'brand' => $value['link_manufacturer']], ['class' => 'cat-link_1']);
            $url_img=strtr(strtolower($value['manufacturer']), " ", "_");
            echo Html::a(Html::img('/img/brands_disk/'.$url_img.'.jpg', [ 'height' => '42']), ['disk/index', 'brand' => $value['link_manufacturer']], ['class' => 'cat-link_2']);
            echo '</div>';
            echo '</li>';
            echo '</ul>';
        }
        ?>
</div>



