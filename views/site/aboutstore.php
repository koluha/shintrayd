<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'О магазине';
$meta_description = $this->title;
$meta_keywords = '';

$this->params['breadcrumbs'][] = $this->title;

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
<div class="container">
    <div class="row">
        <div class="site-about">
            <h1><?= Html::encode($this->title) ?></h1>
            <p>
                Cтраница <?= $this->title ?>  находится в разработке.
            </p>
        </div>
    </div>
</div>