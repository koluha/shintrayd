<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = 'Каталог шин';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="block_breadcrumbs">
    <?php
    echo Breadcrumbs::widget([
        'homeLink' => ['label' => 'Главная', 'url' => '/'],
        'links' => ['Каталог шин'],
    ]);
    ?>
</div>

<div class="col-xs-3">
    <?= $this->render('_left_form_tyre') ?>
</div>   
<div class="col-xs-9">



    <h1>Каталог шин</h2>
        <!--
      <ul class="catalog_base">
              <li>
                  <div class="catalog-it">
                      <a href="#" class="cat-link_1">Шины Toyo</a>
                      <a href="#" class="cat-link_2"><img src="/img/brands_shine/toyo.jpg" width="155" 
                                                          height="42" alt="Шины Toyo"></a>
                      <a href="#" class="cat-link_3"><label class="icon-winter">
                              <span>Зимние</span>
                          </label></a>
                      <a href="#" class="cat-link_4"><label class="icon-summer">
                              <span>Летние</span>
                          </label></a>
                  </div>
              </li>
          </ul>
        -->
        <?php
        foreach ($data as $value) {
            echo '<ul class="catalog_base">';
            echo '<li>';
            echo '<div class="catalog-it">';
            echo Html::a(ucfirst(strtolower($value['brand'])), ['/tyre', 'brand' => $value['link_brand']], ['class' => 'cat-link_1']);

            $css_img = 'cat-link_2 img_155x42_' . ucfirst(strtolower($value['brand']));
            echo Html::a('<div class=' . '"' . $css_img . '"' . '></div>', ['/tyre', 'brand' => $value['link_brand']], ['class' => 'cat-link_2']);
            echo Html::a('<label class="icon-winter"><span>Зимние</span></label>', ['/tyre', 'brand' => $value['link_brand'], 'season' => 'W'], ['class' => 'cat-link_3']);
            echo Html::a('<label class="icon-summer"><span>Летние</span></label>', ['/tyre', 'brand' => $value['link_brand'], 'season' => 'S'], ['class' => 'cat-link_4']);
            echo '</div>';
            echo '</li>';
            echo '</ul>';
        }
        ?>
        <h1>Преимущества покупки автошин в нашем магазине</h1> 
        <p>Магазин  реализует с курьерской доставкой новые зимние и летние шины разных диаметров. В Москве и Подмосковье работают шинные центры, в которых вы можете недорого купить и установить новую резину. Отправка продукции осуществляется по всем городам РФ.</p>
        <p>Для удобного и быстрого подбора новой резины в левой части сайта предусмотрена специальная форма онлайн-поиска. Можно указать точные характеристики зимних шин либо просто выбрать модель автомобиля. В дополнение к этому вы всегда можете позвонить по нашему бесплатному номеру и получить консультацию специалиста.</p>

</div>
















