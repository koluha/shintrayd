<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\models\base\Tyre;
use app\models\Basket;
use app\models\base\Disk;

$this->title = 'Поиск по артикулу';
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

$ob_tyre = new Tyre();
?>
<div class="block_breadcrumbs">
    <?php
    echo Breadcrumbs::widget([
        'homeLink' => ['label' => 'Главная', 'url' => '/'],
        'links' => ['Поиск по артикулу'],
    ]);
    ?>
</div>

<div class="container">
    <div class="row">
        <h3>Результат поиска <?php echo $data['search']  ?></h3> 
        <div class="choice">
            <div class="col-xs-10 item_block">
                <!-- item -->
                <?php
                if ($data['tyre_list']) {

                    foreach ($data['tyre_list'] as $value) {
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
                        <div class='seasonal_storage'>
                            <div class='button2'>
                                Сезонное хранение 
                            </div>
                        </div>
                        <div class='tire'>
                            <div class='button3 mountingbutton' >
                                Шиномонтаж
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
                }
                ?>

                <?php
                if ($data['disk_list']) {

                    $ob_disk = new Disk;

                    $ob_disk->ReverAll($data['disk_list']['manufacturer_disk']);
                    $ob_disk->ReverTypeDisksDr($data['disk_list']['type_disk']);




                    foreach ($data['disk_list'] as $value) {

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
                        <div class='seasonal_storage'>
                            <div class='button2'>
                                Сезонное хранение 
                            </div>
                        </div>
                        <div class='tire'>
                            <div class='button3 mountingbutton'>
                                Шиномонтаж
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
                }
                ?>

            </div>
           
        </div>
         <?php 
            if(!$data['disk_list'] AND !$data['tyre_list']){
                echo '<h2>Нет результата поиска</h2>';
            }
            
            ?>
    </div>