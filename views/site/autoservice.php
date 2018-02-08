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
                    Html::a('<span class="sp_au">Сварка Аргон(TIG\MIG)</span>', ['site/'],['class' => 'svarka_argon']);
                    ?>
                </li>
                <li>
                    <?=
                    Html::a('<span class="sp_au">Тонировка и бронепленка</span>',['site/'], ['class' => 'tonirovka_i_broneplenka']);
                    ?>
                </li>
                <li>
                    <?=
                    Html::a('<span class="sp_au">Автозапчасти (в наличии и под заказ)</span>',['site/'], ['class' => 'avtozapchasti']);
                    ?>
                </li>
                <li>
                    <?=
                    Html::a('<span class="sp_au">Компьютерная диагностика автомобиля</span>',['site/'], ['class' => 'komputernaja_diagnostika']);
                    ?>
                </li>
                <li>
                    <?=
                    Html::a('<span class="sp_au">Ремонт двигателей</span>',['site/'], ['class' => 'remont_dvigatelej']);
                    ?>
                </li>
                <li>
                    <?=
                    Html::a('<span class="sp_au">Ремонт и обслуживание трансмиссии</span>',['site/'], ['class' => 'remont_transmissii']);
                    ?>
                </li>
                <li>
                    <?=
                    Html::a('<span class="sp_au">Ремонт и обслуживание тормозной системы</span>',['site/'], ['class' => 'remont_tormoznoj_sistemy']);
                    ?>
                </li>
                <li>
                    <?=
                    Html::a('<span class="sp_au">Промывка инжектора</span>',['site/'], ['class' => 'promyvka_inzhektora']);
                    ?>
                </li>
                <li>
                    <?=
                    Html::a('<span class="sp_au">Заправка и ремонт автокондиционеров</span>',['site/'], ['class' => 'zapravka_i_remont_avtokondicionerov']);
                    ?>
                </li>
                <li>
                    <?=
                    Html::a('<span class="sp_au">Ремонт дисков</span>',['site/'], ['class' => 'remont_diskov']);
                    ?>
                </li>
                <li>
                    <?=
                    Html::a('<span class="sp_au">Покраска дисков</span>',['site/'], ['class' => 'pokraska_diskov']);
                    ?>
                </li>
            </ul>
        </div>
    </div>
</div>

