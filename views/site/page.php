<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = $data['meta_title'];
$meta_description = $data['meta_keyword'];
$meta_keywords = $data['meta_description'];

$this->params['breadcrumbs'][] = $data['title'];

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
            <h1><?= Html::encode($data['title']) ?></h1>
            <p>
                <?= $data['content'] ?>
            </p>
        </div>
    </div>
</div>