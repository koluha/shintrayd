<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\models\base\Tyre;
use app\models\base\Disk;
use yii\widgets\ActiveForm;
use app\models\base\Podbor;
use app\models\Basket;

$ob_tyre = new Tyre();
$ob_disk = new Disk();
$ob_podbor = new Podbor();
$session = Yii::$app->session;

//$this->title = 'Шины' . ucfirst(strtolower($data['brand'])) . ' ' . ucfirst(strtolower($data['model'])) . ' ' . ucfirst(strtolower($data['season']));
?>


<!-- Поиск по параметрам горизонтальный -->

<div class="container">
    <div class="row"><!-- BEGIN ROW -->
        <?php $data_ = ['session' => $session, 'ob_tyre' => $ob_tyre]; ?>   
        <?= $this->render('top_search', $data_) ?>
    </div><!-- END ROW -->
</div>
<!-- END Поиск по параметрам горизонтальный -->


<div class="container"> <!-- catalog --> 
    <div class="row">
        <div class="choice">
            <span class="ch_h1">
                <br>
                <?php
                if ($data['season'] == 'S') {
                    $season = 'летних шин';
                } elseif ($data['season'] == 'W') {
                    $season = 'зимних шин';
                }
                ?>
                Результат поиска <?= $season ?> <?= $data['shirina'] ?>/<?= $data['profil'] ?><?= ' ' ?><?= $data['diametr'] ?> 
            </span>
            <!--    
            <div class="ch_block_tit block_sel">
                     <span>Сортировка </span>
                     <div class="ch_sort">По цене ↑ </div>
                     <div class="ch_sort">По цене ↓ </div>
                 </div>
            -->
            <div class="col-xs-10 item_block">
                <!-- item -->
                <?php
                foreach ($list as $value) {
                    echo '<div class="item">';
                    $image = Tyre::getImgTyre($value['model']);
                    $ch_block_img = "<div class='ch_block_img'>
                        <div class='ch_img'>
                            <img src='$image'>
                            <label class='ch_search'></label>
                        </div>
                    </div>
                    <div class='ch_block_img_zoom'>
                        <div class='ch_img'>
                            <img src='$image'>
                             </div>
                    </div>
                            ";
                    if ($value['season'] == 'S') {
                        $icon = "<label class='icon-summer_ch'> </label>";
                    } elseif ($value['season'] == 'W') {
                        $icon = "<label class='icon-winter_ch'> </label>";
                    }
                    if ($value['spikes'] == 1) {
                        $icon.="<label class='icon-spikes_ch'></label>";
                    }
                    if ($value['runflat'] == 1) {
                        $icon.="<label class='icon-flat_ch'></label>";
                    }
                    $ch_sezon_block = "<div class='ch_sezon_block'>$icon</div>";

                    $css_img = 'img_155x42_' . ucfirst(strtolower($value['brand']));
                    $css_img = '<div class=' . '"' . $css_img . ' re_175 "' . '></div>';


                    $ch_block_desc = "<div class='ch_block_desc'>
                        <div class='text_ch_tit'>
                              " . Html::a($value['brand'] . ' ' . $value['model'], ['tyre/index',
                                'brand' => $value['link_brand'],
                                'season' => $value['season'],
                                'model' => $value['link_model'],
                                'param' => Tyre::url_param_tyre($value['shirina'], $value['profil'], $value['diametr']),
                                'coefficient' => Tyre::url_coefficient_tyre($value['k_load'], $value['k_speed']),
                                'code77' => $value['code77'],
                            ]) .
                            "</div>
                        <div class='ch_me_param'>
                            <div class='text_ch_param'>
                            " . $value['shirina'] . ' / ' .$value['profil'].' '.$value['diametr']
                            .' <span title="'.$ob_tyre->Load($value['k_load']).'">'.$value['k_load'].'</span>'
                            .' <span title="'.$ob_tyre->Speed($value['k_speed']).'">'.$value['k_speed'].'</span>'.
                            "</div>
                            <div class='text_ch_code'><span>Код товара:</span> " . $value['code77'] . "</div>
                        </div>
                        <div class='ch_block_brand'>
                            <div class='ch_brand'>
                             " . $css_img . "
                            </div>
                        </div>
                    </div>";

                    
                    //Какое кол-во добавлять в корзину
                    $data_count = Basket::arr_drop($value['total']);
                    //data_count=".$data_count['active']."

                    $ch_block_price = "<div class='ch_block_price'>
                        <div class='ch_price'><span>" . number_format($value['price_roz'], 0, '', ' ') . "</span>  РУБ.</div>
                        <div>В наличии , " . $value['total'] . " шт.</div>
                          <div data-count=" . $data_count['active'] . " data-id=" . $value['id'] . " data-brand=" . $value['brand'] . " data-article=" . $value['code77'] . "  data-nomenclature='tyre' class='add_basket button1 btn_ch'>
                            Купить
                        </div>
                    </div>";

                    $ch_block_sesshina = "<div class='ch_block_sesshina'>
                      <div class='tire'>
                            <div class='button3 mountingbutton' >
                                Шиномонтаж
                            </div>
                        </div>
                            <div class='seasonal_storage'>
                            <div class='seasonal_str'>
                                Сезонное хранение 3 000 руб. 
                            </div>
                        </div>
                    </div>";
                    echo $ch_block_img;
                    echo $ch_sezon_block;
                    echo $ch_block_desc;
                    echo $ch_block_price;
                    echo $ch_block_sesshina;
                    echo '</div>';
                }
                ?>
                <!-- end item -->

            </div>
            <div class="col-xs-2 item_block_rigth">
                <div class="block_bar">
                    <div class="ch_block_img_r">
                        <div class="ch_img_r">
                            <div class="label_icon_r">
                                <label class="icon-winter_ch"> </label>
                            </div>
                            <div class="sale">
                                <div class="label_sale">
                                    <div class="discount__bottom">Акция</div>
                                </div>
                            </div>
                            <img src="/img/bfgoodrich-all-terrain.jpg">
                        </div>
                    </div>
                    <div class="ch_block_desc_r">
                        <div class="text_ch_tit"><a href="">Michelin Pilot Sport 2</a></div>
                        <div class="text_ch_param">155/70 R13 75Q</div>
                        <div class="text_ch_code"><span>Код товара:</span> 689004</div>
                    </div>
                    <div class="brands_ri">
                        <img src="/img/brands_shine/dunlop.jpg">
                    </div>
                    <div class="ch_block_price_r">
                        <div class="ch_price"><span>2&nbsp;080</span>  РУБ.</div>
                        <div>В наличии , 16 шт.</div> 
                        <div  class="add_basket button1 btn_ch_r">
                            Купить
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</div>     <!-- End catalog --> 



