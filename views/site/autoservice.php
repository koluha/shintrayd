<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = 'Услуги автосервиса';
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
        'links' => ['Услуги автосервиса'],
    ]);
    ?>
</div>
<div class="container">
    <div class="row">
        <div class="site-about">
            <h1>Автосервис «N-TYRE.NET» предлагает услуги качественного ремонта автомобилей европейских и японских марок, по приемлемым ценам.  </h1>
            <p>
                Мы оказываем услуги по ремонту и обслуживанию автомобилей. Наши клиенты могут рассчитывать на качественный и быстрый автосервис, здесь доступные и адекватные цены.
            </p>
            <p>
                Каждый клиент может лично наблюдать за ремонтом автомобиля, чтобы удостовериться в обнаруженных неисправностях, а так же убедиться в квалификации наших специалистов. Вы всегда будете знать, кто из работников центра отвечает за авто и кто выполняет ремонт.
            </p>
            
            <ul>
                <li><a href="<?php echo Url::toRoute('site/'); ?>">Диагностика автомобиля</a></li>
                <li><a href="<?php echo Url::toRoute('site/'); ?>">Ремонт как бензиновых, так и дизельных двигателей</a></li>
                <li><a href="<?php echo Url::toRoute('site/'); ?>">Ремонт и обслуживание трансмиссии</a></li>
                <li><a href="<?php echo Url::toRoute('site/'); ?>">Ремонт и обслуживание тормозной системы</a></li>
                <li><a href="<?php echo Url::toRoute('site/'); ?>">Промывка инжектора</a></li>
                <li><a href="<?php echo Url::toRoute('site/'); ?>">Заправка и ремонт автокондиционеров</a></li>
                <li><a href="<?php echo Url::toRoute('site/'); ?>">Ремонт дисков</a></li>
             </ul>
        </div>
    </div>
</div>