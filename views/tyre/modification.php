<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\models\base\Tyre;
use app\models\Basket;

$script = <<< JS
          $(function () {
                $("#tabs").tabs();
            });
JS;
$this->registerJs($script, yii\web\View::POS_READY);

$this->title = 'Шины' . ucfirst(strtolower($data['brand'])) . ' ' . ucfirst(strtolower($data['model'])) . ' ' . ucfirst(strtolower($data['season']));
$this->params['breadcrumbs'][] = $this->title;

$ob_tyre = new Tyre();

?>


<div class="container">
    <div class="row">

        <?php
        echo Breadcrumbs::widget([
            'homeLink' => ['label' => 'Главная', 'url' => '/'],
            'links' => [
                [ 'label' => 'Каталог шин',
                    'url' => ['/tyre/index'],
                ],
                [ 'label' => ucfirst(strtolower($data['brand'])),
                    'url' => ['/tyre/index', 'brand' => $data['link_brand']],
                ],
                ucfirst(strtolower($data['model'])),
            ],
        ]);
        ?>
        <div class="block_product clearfix">
            <div class="col-xs-3">
                <div class="pr_img_block ">
                    <?php $image = Tyre::getImgTyre($data['model']); ?>
                    <div class="pr_img">
                        <img src="<?= $image ?>">
                        <label class="ch_search"></label>
                    </div>
                    <div class="pr_article">
                      <!--  <span>Код продукта:</span> 4565215 --->
                    </div>
                </div>
                <div class='ch_block_img_zoom'>
                    <div class='ch_img'>
                        <img src=<?= $image ?> >
                    </div>
                </div>
            </div>
            <div class="col-xs-9">
                <div class="pr_block-top clearfix">
                    <div class="pr_head">
                        <div class="pr_title"><?php echo $data['brand'] . ' / ' . $data['model']; ?></div>
                        <div class="label_icon_pr">
                            <?php
                            if ($data['season'] == 'W') {
                                $rext = '<label class="icon-winter_ch"> Зима </label>';
                            } elseif ($data['season'] == 'S') {
                                $rext = '<label class="icon-summer_ch"> Лето </label>';
                            }
                            echo $rext;
                            ?>
                        </div>
                    </div>
                    <div class="logo_manufacture">
                        <?php
                        $css_img = 'img_155x42_' . ucfirst(strtolower($data['brand']));
                        $r = '<div class=' . '"' . $css_img . ' re_175 "' . '></div>';
                        echo $r;
                        ?>
                    </div>
                </div>
                <div class="pr_block_desc clearfix">
                </div>

                <div class="tabs_my">
                    <div id="tabs">
                        <ul>
                            <li><a href="#tabs-1">Модификации</a></li>
                            <li><a href="#tabs-2">Отзывы(0)</a></li>
                        </ul>
                        <div class="pr_block_desc clearfix" id="tabs-1">


                            <table border="1">
                                <thead>
                                <th>Размер</th>
                                <th>Коэффициент<br> нагрузки</th>
                                <th>Коэффициент<br>  скорости</th>
                                <th>Цена</th>
                                <th>В наличии </th>
                                <th></th>
                                </thead>

                                <?php
                                //Переберем значение R - радиус 
                                foreach ($data['list'] as $value) {
                                    $input[] = $value['diametr'];
                                }

                                //Без лишних диаметров убраны
                                $diametr_ex = array_unique($input);
                                echo '<tbody>';
                                foreach ($diametr_ex as $d) {
                                    echo ' <th>' . $d . '</th>';
                                    foreach ($data['list'] as $value) {
                                        if ($value['diametr'] == $d) {
                                            echo ' </tr>';
                                            //  echo ' <td>' . yii\bootstrap\Html::a($value['name'], '') . '</td>';

                                            echo ' <td>&nbsp;' . Html::a($value['shirina'] . '/' . $value['profil'] . '&nbsp;' . $value['diametr'], ['tyre/index', 'brand' => $data['link_brand'],
                                                'season' => $data['season'],
                                                'model' => $data['link_model'],
                                                'param' => Tyre::url_param_tyre($value['shirina'], $value['profil'], $value['diametr']),
                                                'coefficient' => Tyre::url_coefficient_tyre($value['k_load'], $value['k_speed']),
                                                'code77' => $value['code77'],
                                            ])
                                            . ' &nbsp;</td>';

                                            echo ' <td>&nbsp;'.' <span title="' . $ob_tyre->Load($value['k_load']) . '">' . $value['k_load'] . '</span>'.'</td>';
                                            echo ' <td>&nbsp;'.' <span title="'.$ob_tyre->Speed($value['k_speed']).'">'.$value['k_speed'].'</span>'.'</td>';
                                            echo ' <td>&nbsp;' . number_format($value['price_roz'], 0, '', ' ') . ' руб.</td>';
                                            echo ' <td>&nbsp;' . $value['total'] . ' шт.</td>';
                                            //Какое кол-во добавлять в корзину
                                            $data_count = Basket::arr_drop($value['total']);
                                            //data_count=".$data_count['active']."
                                            echo ' <td><div data-count=' . $data_count['active'] . ' data-id=' . $value['id'] . ' data-brand=' . $value['brand'] . ' data-article=' . $value['code77'] . '  data-nomenclature="tyre" class="add_basket button1 pr_btn">
                                                купить
                                            </div></td>';
                                            echo ' </tr>';
                                        }
                                    }
                                }
                                echo '</tbody>';
                                ?>
                            </table>   
                        </div>
                        <div id="tabs-2">

                        </div>
                    </div>
                </div>
                <!-- end tabs --> 


            </div>
        </div>
    </div>
</div>
<div class="container"> 
    <div class="row">
        <!-- tabs --> 

    </div>
</div>     



