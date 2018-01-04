<?php

use yii\helpers\Html;
use app\models\base\Tyre;
use yii\widgets\Breadcrumbs;
use app\models\Basket;
use yii\bootstrap\Tabs;

$script = <<< JS
          $(function () {
                $("#tabs").tabs();
            });
JS;
$this->registerJs($script, yii\web\View::POS_READY);

$this->title = 'Шины '.$data['name']. ucfirst(strtolower($data['brand'])) . ' ' . ucfirst(strtolower($data['model'])) . ' ' . ucfirst(strtolower($data['season']));
$meta_description = $this->title;
$meta_keywords = $this->title;

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
                [ 'label' => ucfirst(strtolower($data['model'])),
                    'url' => ['/tyre/index', 'brand' => $data['link_brand'], 'season' => $data['season'], 'model' => $data['link_model']],
                ],
                ucfirst(strtolower($data['name'])),
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
                        <?= $data['code77'] ?>
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
                        <h4><?php echo $data['name'] ?></h4>
                        <div class="label_icon_pr">
                            <?php
                            if ($data['season'] == 'W') {
                                $rext = '<label class="icon-winter_ch"> Зима </label>';
                            } elseif ($data['season'] == 'S') {
                                $rext = '<label class="icon-summer_ch"> Лето </label>';
                            }

                            if ($data['spikes'] == 1) {
                                $rext.="<label class='icon-spikes_ch'>Шипы</label>";
                            }
                            if ($data['runflat'] == 1) {
                                $rext.="<label class='icon-flat_ch'>RunFlat</label>";
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

                <div class="pr_block_add clearfix">
                    <div class="pr_price">
                        <div class="ch_price"><span><?= number_format($data['price_roz'], 0, '', ' ') ?></span> РУБ. x
                            <?php
                            $arr = Basket::arr_drop($data['total']);

                            echo Html::dropDownList('quantity', $arr['active'], $arr['items'], ['id' => 'quantity']);
                            ?>


                         <!--   <select name="quantity" id="quantity">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4" selected="">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                            -->
                            шт. = <span class="price_roz_total"><?php
                                $price_roz = $data['price_roz'] * $arr['active'];
                                echo number_format($price_roz, 0, '', ' ');
                                ?></span> РУБ.

                            <!-- Для JS -->
                            <div class="price_roz" hidden="true">
                                <?= $data['price_roz'] ?>
                            </div>

                            <div data-count="<?= $arr['active'] ?>" data-id="<?= $data['id'] ?>" data-brand="<?= $data['brand'] ?>" data-article="<?= $data['code77'] ?>" data-nomenclature="tyre"  class="add_basket button1 pr_btn">
                                Добавить в корзину
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pr_block_desc clearfix">
                    <div class="pr_desc_tit">Технические характеристики:</div>
                    <div class="pr_desc_item clearfix">
                        <div class="pr_desc_parametr">Наличие:</div>
                        <div class="pr_desc_value"><?= ($data['total']) ? $data['total'] . ' шт.' : '' ?></div>
                    </div>
                    <div class="pr_desc_item clearfix">
                        <div class="pr_desc_parametr">Размерность:</div>
                        <div class="pr_desc_value"><?php echo $data['shirina'] . ' / ' . $data['profil'] . ' ' . $data['diametr']; ?></div>
                    </div>
                    <div class="pr_desc_item clearfix">
                        <div class="pr_desc_parametr">Сезон:</div>
                        <div class="pr_desc_value"> <?php
                            if ($data['season'] == 'W') {
                                $rext = 'Зима ';
                            } elseif ($data['season'] == 'S') {
                                $rext = 'Лето';
                            } echo $rext;
                            ?></div>
                    </div>
                    <div class="pr_desc_item clearfix">
                        <div class="pr_desc_parametr">Шипы:</div>
                        <div class="pr_desc_value">
                            <?php
                            if ($data['spikes'] == 1) {
                                $rext = 'Шины';
                            } else {
                                $rext = 'Нет';
                            } echo $rext;
                            ?>
                        </div>
                    </div>
                    <div class="pr_desc_item clearfix">
                        <div class="pr_desc_parametr">RunFlat:</div>
                        <div class="pr_desc_value">
                            <?php
                            if ($data['runflat'] == 1) {
                                $rext = 'Да';
                            } else {
                                $rext = 'Нет';
                            } echo $rext;
                            ?>

                        </div>
                    </div>

                    <div class="pr_desc_item clearfix">
                        <div class="pr_desc_parametr">Коэффициент нагрузки:</div>
                        <div class="pr_desc_value">
                            <span title="<?= $ob_tyre->Load($data['k_load']) ?>"><?= $data['k_load'] ?></span>
                        </div>
                    </div>

                    <div class="pr_desc_item clearfix">
                        <div class="pr_desc_parametr">Коэффициент скорости:</div>
                        <div class="pr_desc_value">
                            <span title="<?= $ob_tyre->Speed($data['k_speed']) ?>"><?= $data['k_speed'] ?></span>
                        </div>
                    </div>
                    <!--<div class="pr_desc_link"><a href="#">-> Все характеристики</a></div>  -->
                </div>



            </div>
        </div>
    </div>
</div>
<div class="container"> 
    <div class="row">
        <!-- tabs --> 
        <div class="tabs_my">
            <?php
            echo Tabs::widget([
                'items' => [
                    [
                        'label' => 'Описание',
                        'content' => '<br><p>Вкладка описание в стадий наполнении</p>',
                        'active' => true
                    ],
                    [
                        'label' => 'Фото',
                        'content' => '<br><p>Вкладка фото в стадий наполнении</p>'
                    ],
                    [
                        'label' => 'Карта',
                        'content' => '<br><p>Вкладка карта в стадий наполнении</p>',
                    ],
                    [
                        'label' => 'Отзывы(0)',
                        'content' => '<br><p>Вкладка отзывы в стадий наполнении</p>'
                    ],
                ]
            ]);
            ?>
        </div>
        <!-- end tabs --> 
    </div>
</div>     


