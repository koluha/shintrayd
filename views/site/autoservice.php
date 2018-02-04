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

            <ul class="autoservice">
                <li>
                    <span>Сварка Аргон(TIG\MIG)</span>
                    <?= Html::a(Html::img("/img/page/Svarka_Argon.jpg", ['class' => 'img_au', 'alt' => 'Сварка Аргон(TIG\MIG)', 'width' => '320', 'height' => '200']), ['site/']) ?>
                </li>
                <li>
                    <span>Тонировка и бронепленка</span>
                    <?= Html::a(Html::img("/img/page/Tonirovka_i_broneplenka.jpg", ['alt' => 'Тонировка и бронепленка', 'width' => '320', 'height' => '200']), ['site/']) ?>
                </li>
                <li>
                    <span>Автозапчасти (в наличии и под заказ)</span>
                    <?= Html::a(Html::img("/img/page/Avtozapchasti_v_nalichii_i_pod_zakaz.jpg", ['alt' => 'Автозапчасти (в наличии и под заказ)', 'width' => '320', 'height' => '200']), ['site/']) ?>
                </li>
                <li>
                    <span>Компьютерная диагностика автомобиля</span>
                    <?= Html::a(Html::img("/img/page/Kompyuternaya_diagnostika_avtomobilya.jpg", ['alt' => 'Компьютерная диагностика автомобиля', 'width' => '320', 'height' => '200']), ['site/']) ?>
                </li>
                <li>
                    <span>Ремонт как бензиновых, так и дизельных двигателей</span>
                    <?= Html::a(Html::img("/img/page/Remont_kak_benzinovyh_tak_i_dizelnyh_dvigatelej.jpg", ['alt' => 'Ремонт как бензиновых, так и дизельных двигателей', 'width' => '320', 'height' => '200']), ['site/']) ?>
                </li>
                <li>
                    <span>Ремонт и обслуживание трансмиссии</span>
                    <?= Html::a(Html::img("/img/page/Remont_i_obsluzhivanie_transmissii.jpeg", ['alt' => 'Ремонт и обслуживание трансмиссии', 'width' => '320', 'height' => '200']), ['site/']) ?>
                </li>
                <li>
                    <span>Ремонт и обслуживание тормозной системы</span>
                    <?= Html::a(Html::img("/img/page/Remont_i_obsluzhivanie_tormoznoj_sistemy.jpg", ['alt' => 'Ремонт и обслуживание тормозной системы', 'width' => '320', 'height' => '200']), ['site/']) ?>
                </li>
                <li>
                    <span>Промывка инжектора</span>
                    <?= Html::a(Html::img("/img/page/Promyvka_inzhektora.jpg", ['alt' => 'Промывка инжектора', 'width' => '320', 'height' => '200']), ['site/']) ?>
                </li>
                <li>
                    <span>Заправка и ремонт автокондиционеров</span>
                    <?= Html::a(Html::img("/img/page/Zapravka_i_remont_avtokondicionerov.jpg", ['alt' => 'Заправка и ремонт автокондиционеров', 'width' => '320', 'height' => '200']), ['site/']) ?>
                </li>
                <li>
                    <span>Ремонт дисков</span>
                    <?= Html::a(Html::img("/img/page/Remont_diskov.jpg", ['alt' => 'Ремонт дисков', 'width' => '320', 'height' => '200']), ['site/']) ?>
                </li>
            </ul>
        </div>
    </div>
</div>

