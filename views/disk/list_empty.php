<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\models\base\Disk;
use yii\widgets\ActiveForm;

$session = Yii::$app->session;
$ob_disk = new Disk;
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


            <div class="col-xs-10 item_block">
                <!-- item -->
                <h2>К сожалению, нет в наличии колесных дисков c такими параметрами.</h2>
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



