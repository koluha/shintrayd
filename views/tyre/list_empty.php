<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\models\base\Tyre;
use yii\widgets\ActiveForm;

$ob_tyre = new Tyre();
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
                Результат поиска 
                <?= $season ?> 
                <?= $ob_tyre->ReverAll($data['brand']) ?> 
                <?= $data['shirina'] ?>/<?= $data['profil'] ?><?= ' ' ?><?= $data['diametr'] ?> 
                <?= ($data['spikes']) ? ', шипованная ' : ''; ?>
                <?= ($data['runflat']) ? ', runflat': ''; ?>
                <?= ($data['coef_speed']) ? 'коэффициент скорости: '.$data['coef_speed'] : ''; ?>

            </span>


            <div class="col-xs-10 item_block">
                <!-- item -->
                <h2>К сожалению, нет в наличии шин c такими параметрами.</h2>
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
                        <div class="button1 btn_ch_r">
                            Купить
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>     <!-- End catalog --> 



