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
                    <div class="block_svarka_argon">
                        <a href="/page?url=svarka_argon">
                            <span class="sp_au">Сварка Аргон(TIG\MIG)</span>
                        </a>
                    </div>
                    <div class="parency">
                    </div>
                </li>
                
                <li>
                    <div class="block_tonirovka_i_broneplenka">
                        <a href="/page?url=tonirovka_i_broneplenka">
                            <span class="sp_au">Тонировка и бронепленка</span>
                        </a>
                    </div>
                    <div class="parency">
                    </div>
                </li>
                 <li>
                    <div class="block_avtozapchasti_v_nalichii_i_pod_zakaz">
                        <a href="/page?url=avtozapchasti_v_nalichii_i_pod_zakaz">
                            <span class="sp_au">Автозапчасти (в наличии и под заказ)</span>
                        </a>
                    </div>
                    <div class="parency">
                    </div>
                </li>
                 <li>
                    <div class="block_kompyuternaya_diagnostika_avtomobilya">
                        <a href="/page?url=kompyuternaya_diagnostika_avtomobilya">
                            <span class="sp_au">Компьютерная диагностика автомобиля</span>
                        </a>
                    </div>
                    <div class="parency">
                    </div>
                </li>
                 <li>
                    <div class="block_remont_dvigateley">
                        <a href="/page?url=remont_dvigateley">
                            <span class="sp_au">Ремонт двигателей</span>
                        </a>
                    </div>
                    <div class="parency">
                    </div>
                </li>
                 <li>
                    <div class="block_remont_i_obslujivanie_transmissii">
                        <a href="/page?url=remont_i_obslujivanie_transmissii">
                            <span class="sp_au">Ремонт и обслуживание трансмиссии</span>
                        </a>
                    </div>
                    <div class="parency">
                    </div>
                </li>
                 <li>
                    <div class="block_remont_i_obslujivanie_tormoznoy_sistemyi">
                        <a href="/page?url=remont_i_obslujivanie_tormoznoy_sistemyi">
                            <span class="sp_au">Ремонт и обслуживание тормозной системы</span>
                        </a>
                    </div>
                    <div class="parency">
                    </div>
                </li>
                 <li>
                    <div class="block_promyivka_injektora">
                        <a href="/page?url=promyivka_injektora">
                            <span class="sp_au">Промывка инжектора</span>
                        </a>
                    </div>
                    <div class="parency">
                    </div>
                </li>
                 <li>
                    <div class="block_zapravka_i_remont_avtokonditsionerov">
                        <a href="/page?url=zapravka_i_remont_avtokonditsionerov">
                            <span class="sp_au">Заправка и ремонт автокондиционеров</span>
                        </a>
                    </div>
                    <div class="parency">
                    </div>
                </li>
                 <li>
                    <div class="block_remont_diskov">
                        <a href="/page?url=remont_diskov">
                            <span class="sp_au">Ремонт дисков</span>
                        </a>
                    </div>
                    <div class="parency">
                    </div>
                </li>
                 <li>
                    <div class="block_pokraska_diskov">
                        <a href="/page?url=pokraska_diskov">
                            <span class="sp_au">Покраска дисков</span>
                        </a>
                    </div>
                    <div class="parency">
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

