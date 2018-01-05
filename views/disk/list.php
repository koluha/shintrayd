<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\models\base\Disk;
use yii\widgets\ActiveForm;
use app\models\base\Podbor;
use app\models\Basket;

$ob_disk = new Disk();
$ob_podbor = new Podbor();
$session = Yii::$app->session;

//$this->title = 'Шины' . ucfirst(strtolower($data['brand'])) . ' ' . ucfirst(strtolower($data['model'])) . ' ' . ucfirst(strtolower($data['season']));
?>



<!-- Поиск по параметрам горизонтальный -->

<div class="container">
    <div class="row"><!-- BEGIN ROW -->
        <?php $data_ = ['session' => $session, 'ob_disk' => $ob_disk]; ?>   
        <?= $this->render('top_search', $data_) ?>
    </div><!-- END ROW -->
</div>
<!-- END Поиск по параметрам горизонтальный -->


<div class="container"> <!-- catalog --> 
    <div class="row">
        <div class="choice">
            <span class="ch_h1">
                <br>
                Результат поиска дисков
                <?= $ob_disk->ReverAll($data['manufacturer_disk']) ?> 
                <?= $ob_disk->ReverTypeDisksDr($data['type_disk']) ?>
                <?= ($data['diametr_disk']) ? 'диаметр ' . $data['diametr_disk'] : ''; ?>
                <?= ($ob_disk->ReverAll($data['diametr_width_disk'])) ? 'ширина ' . $data['diametr_width_disk'] . 'j' : ''; ?>
                <?= ($ob_disk->ReverAll($data['et_disk'])) ? 'вылет ET ' . $data['et_disk'] : ''; ?>
                <?= ($data['pcd_disk']) ? 'pcd ' . $data['pcd_disk'] : ''; ?>
                <?= ($data['x_cd_disk']) ? 'x' . $data['x_cd_disk'] : ''; ?>
                <?= ($ob_disk->ReverAll($data['co_disk'])) ? 'ЦО ' . $data['co_disk'] : ''; ?>
                <?= ($data['color']) ? ' цвет: ' . $ob_disk->GetColorUrl($data['color']) : ''; ?> 

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

                    $p = '';
                    unset($params);

                    $params[] = ($value['type']) ? 'Тип: ' . $ob_disk->ReverTypeDisksDr($value['type']) : '';
                    $params[] = ($value['color']) ? ' Цвет: ' . $value['color'] : '';

                    $params[] = ($value['diametr']) ? ' <br>Диаметр: ' . $value['diametr'] : '';
                    $params[] = ($value['diametr_width']) ? ' Ширина: ' . $value['diametr_width'] : '';
                    $params[] = ($value['vilet']) ? ' Вылет ET: ' . $value['vilet'] : '';
                    $params[] = ($value['pcd']) ? ' pcd: ' . $value['pcd'] : '';
                    $params[] = ($value['x_pcd']) ? 'x ' . $value['x_pcd'] : '';
                    $params[] = ($value['co']) ? ' ЦО: ' . $value['co'] : '';

                    foreach ($params as $param) {
                        $p.=$param;
                    }
                    $image = Disk::getImgDisk($value['model'],$value['manufacturer']);
                    echo '<div class="item">';
                    $ch_block_img = "<div class='ch_block_img'>
                        <div class='ch_img'>
                            <img class='img_disk' src='$image'>
                            <label class='ch_search'></label>
                        </div>
                    </div> 
                    <div class='ch_block_img_zoom'>
                        <div class='ch_img'>
                            <img src='$image'>
                             </div>
                    </div>";

                    $ch_sezon_block = "<div class='ch_sezon_block'>$icon</div>";

                    $img = strtr(strtolower($value['manufacturer']), " ", "_");

                    $css_img = Html::img('/img/brands_disk/' . $img . '.jpg', [ 'height' => '42']);


                    $ch_block_desc = "<div class='ch_block_desc'>
                        <div class='text_ch_tit'>
                              " . Html::a($value['manufacturer'] . ' ' . $value['model'], ['disk/index',
                                'brand' => $value['link_manufacturer'],
                                'model' => $value['link_model'],
                                'code77' => $value['code77'],
                            ]) . "
                            </div>
                        <div class='ch_me_param'>
                        <br>
                            <div class='text_param'>
                            " . $p
                            . "
                            </div>
                            <div class='text_ch_code'><span>Код товара:</span> " . $value['code77'] . "</div>
                        </div>
                        <div class='ch_block_brand'>
                            <div class='ch_brand'>
                              <div class='img_list_disk'>
                             " . $css_img . "
                             </div>    
                            </div>
                        </div>
                    </div>";

                    //Какое кол-во добавлять в корзину
                    $data_count = Basket::arr_drop($value['total']);
                    //data_count=".$data_count['active']."

                    $ch_block_price = "<div class='ch_block_price'>
                        <div class='ch_price'><span>" . number_format($value['price_roz'], 0, '', ' ') . "</span>  РУБ.</div>
                        <div>В наличии , " . $value['total'] . " шт.</div>
                        <div data-count=" . $data_count['active'] . " data-id=" . $value['id'] . " data-brand=" . $value['manufacturer'] . " data-article=" . $value['code77'] . "  data-nomenclature='disk' class='add_basket button1 btn_ch'>
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
                        <div class="add_basket button1 btn_ch_r">
                            Купить
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>     <!-- End catalog --> 



