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
                    <?=
                    Html::a('<span class="sp_au">Сварка Аргон(TIG\MIG)</span>', ['site/page', 'url' => 'svarka_argon'],['class' => 'svarka_argon']);
                    ?>
                </li>
                <li>
                    <?=
                    Html::a('<span class="sp_au">Тонировка и бронепленка</span>',['site/page', 'url' => 'tonirovka_i_broneplenka'], ['class' => 'tonirovka_i_broneplenka']);
                    ?>
                </li>
                <li>
                    <?=
                    Html::a('<span class="sp_au">Автозапчасти (в наличии и под заказ)</span>',['site/page', 'url' => 'avtozapchasti_v_nalichii_i_pod_zakaz'], ['class' => 'avtozapchasti']);
                    ?>
                </li>
                <li>
                    <?=
                    Html::a('<span class="sp_au">Компьютерная диагностика автомобиля</span>',['site/page', 'url' => 'kompyuternaya_diagnostika_avtomobilya'], ['class' => 'komputernaja_diagnostika']);
                    ?>
                </li>
                <li>
                    <?=
                    Html::a('<span class="sp_au">Ремонт двигателей</span>',['site/page', 'url' => 'remont_dvigateley'], ['class' => 'remont_dvigatelej']);
                    ?>
                </li>
                <li>
                    <?=
                    Html::a('<span class="sp_au">Ремонт и обслуживание трансмиссии</span>',['site/page', 'url' => 'remont_i_obslujivanie_transmissii'], ['class' => 'remont_transmissii']);
                    ?>
                </li>
                <li>
                    <?=
                    Html::a('<span class="sp_au">Ремонт и обслуживание тормозной системы</span>',['site/page', 'url' => 'remont_i_obslujivanie_tormoznoy_sistemyi'], ['class' => 'remont_tormoznoj_sistemy']);
                    ?>
                </li>
                <li>
                    <?=
                    Html::a('<span class="sp_au">Промывка инжектора</span>',['site/page', 'url' => 'promyivka_injektora'], ['class' => 'promyvka_inzhektora']);
                    ?>
                </li>
                <li>
                    <?=
                    Html::a('<span class="sp_au">Заправка и ремонт автокондиционеров</span>',['site/page', 'url' => 'zapravka_i_remont_avtokonditsionerov'], ['class' => 'zapravka_i_remont_avtokondicionerov']);
                    ?>
                </li>
                <li>
                    <?=
                    Html::a('<span class="sp_au">Ремонт дисков</span>',['site/page', 'url' => 'remont_diskov'], ['class' => 'remont_diskov']);
                    ?>
                </li>
                <li>
                    <?=
                    Html::a('<span class="sp_au">Покраска дисков</span>',['site/page', 'url' => 'pokraska_diskov'], ['class' => 'pokraska_diskov']);
                    ?>
                </li>
            </ul>
        </div>
    </div>
</div>

