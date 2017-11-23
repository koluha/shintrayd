<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\models\base\Disk;
use app\models\Basket;
use yii\bootstrap\Tabs;

$script = <<< JS
          $(function () {
                $("#tabs").tabs();
            });
JS;
$this->registerJs($script, yii\web\View::POS_READY);

$this->title = 'Диск' . ucfirst(strtolower($data['manufacturer'])) . ' ' . ucfirst(strtolower($data['model'])) . ' ' . ucfirst(strtolower($data['season']));
$this->params['breadcrumbs'][] = $this->title;

$ob_disk = new Disk;
?>


<div class="container">
    <div class="row">
        <?php
        echo Breadcrumbs::widget([
            'homeLink' => ['label' => 'Главная', 'url' => '/'],
            'links' => [
                [ 'label' => 'Каталог дисков',
                    'url' => ['/disk/index'],
                ],
                [ 'label' => ucfirst(strtolower($data['manufacturer'])),
                    'url' => ['/disk/index', 'brand' => $data['link_manufacturer']],
                ],
                [ 'label' => ucfirst(strtolower($data['model'])),
                    'url' => ['/disk/index', 'brand' => $data['link_manufacturer'], 'model' => $data['link_model']],
                ],
                ucfirst(strtolower($data['name'])),
            ],
        ]);
        ?>
        <div class="block_product clearfix">
            <div class="col-xs-3">
                <div class="pr_img_block ">
                    <?php $image = Disk::getImgDisk($data['model']); ?>
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
                        <div class="pr_title"><?php echo $data['manufacturer'] . ' / ' . $data['model']; ?></div>
                        <h4><?php echo $data['name'] ?></h4>
                        <div class="label_icon_pr">

                        </div>
                    </div>
                    <div class="logo_manufacture">
                        <?php
                        $css_img = 'img_155x42_' . ucfirst(strtolower($data['manufacturer']));
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

<!--  <select name="counter" class="counter">
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
                                $price_roz = $data['price_roz'] * 4;
                                echo number_format($price_roz, 0, '', ' ');
                                ?></span> РУБ.

                            <!-- Для JS -->
                            <div class="price_roz" hidden="true">
                                <?= $data['price_roz'] ?>
                            </div>

                            <div data-count="<?= $arr['active'] ?>" data-id="<?= $data['id'] ?>" data-brand="<?= $data['manufacturer'] ?>" data-article="<?= $data['code77'] ?>" data-nomenclature="disk"  class="add_basket button1 pr_btn">
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
                        <div class="pr_desc_parametr">Тип:</div>
                        <div class="pr_desc_value"><?= $ob_disk->ReverTypeDisksDr($data['type']) ?></div>
                    </div>
                    <div class="pr_desc_item clearfix">
                        <div class="pr_desc_parametr">Цвет:</div>
                        <div class="pr_desc_value"><?= $data['color'] ?></div>
                    </div>

                    <div class="pr_desc_item clearfix">
                        <div class="pr_desc_parametr">Размер:</div>
                        <div class="pr_desc_value"><?= $data['diametr'] . ' / ' . $data['diametr_width'] . 'J' ?></div>
                    </div>
                    <div class="pr_desc_item clearfix">
                        <div class="pr_desc_parametr">PCD:</div>
                        <div class="pr_desc_value"><?= $data['pcd'] . ' x ' . $data['x_pcd'] ?></div>
                    </div>
                    <div class="pr_desc_item clearfix">
                        <div class="pr_desc_parametr">ЦО:</div>
                        <div class="pr_desc_value"><?= $data['co'] ?></div>
                    </div>
                    <div class="pr_desc_item clearfix">
                        <div class="pr_desc_parametr">Вылет:</div>
                        <div class="pr_desc_value"><?= $data['vilet'] ?></div>
                    </div>


                    <!-- <div class="pr_desc_link"><a href="#">-> Все характеристики</a></div> -->
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


