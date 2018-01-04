<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = 'Услуги';
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
<div class="block_breadcrumbs">
    <?php
    echo Breadcrumbs::widget([
        'homeLink' => ['label' => 'Главная', 'url' => '/'],
        'links' => ['Услуги'],
    ]);
    ?>
</div>
<div class="container">
    <div class="row">
        <div class="site-about">
            <h1><?= Html::encode($this->title) ?></h1>
            <ul >
                <li><a href="<?php echo Url::toRoute('site/washinginjector'); ?>">Промывка инжектора</a></li>
                <li><a href="<?php echo Url::toRoute('site/refuelingairconditioners'); ?>">Заправка и ремонт автокондиционеров</a></li>
                <li><a href="<?php echo Url::toRoute('site/mounting'); ?>">Шиномонтаж</a></li>
                <li><a href="<?php echo Url::toRoute('site/seasonalstorage'); ?>">Сезонное хранение</a></li>
                <li><a href="<?php echo Url::toRoute('site/repairofdisks'); ?>">Ремонт дисков</a></li>

            </ul>

        </div>
    </div>
</div>
