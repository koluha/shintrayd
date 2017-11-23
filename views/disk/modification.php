<?php
$script = <<< JS
          $(function () {
                $("#tabs").tabs();
            });
JS;

$this->registerJs($script, yii\web\View::POS_READY);

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\models\base\Disk;
use app\models\Basket;

$this->title = 'Колесные диски' . ucfirst(strtolower($data['brand'])) . ' ' . ucfirst(strtolower($data['model'])) . ' ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="row">
        <?php
        echo Breadcrumbs::widget([
            'homeLink' => ['label' => 'Главная', 'url' => '/'],
            'links' => [
                [ 'label' => 'Каталог колесных дисков',
                    'url' => ['/disk/index'],
                ],
                [ 'label' => ucfirst(strtolower($data['brand'])),
                    'url' => ['/disk/index', 'brand' => $data['link_brand']],
                ],
                ucfirst(strtolower($data['model'])),
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
                    </div>
                    <div class="logo_manufacture">
                        <?php
                        $url_img = strtr(strtolower($data['brand']), " ", "_");
                        echo Html::img('/img/brands_disk/' . $url_img . '.jpg');
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
                                <th></th>
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
                                    echo ' <th> R' . $d . '</th>';
                                    foreach ($data['list'] as $value) {
                                        if ($value['diametr'] == $d) {
                                            echo ' </tr>';

                                            echo ' <td>' . yii\bootstrap\Html::a(' R' . $value['diametr'] . ' / ' . $value['diametr_width'] . 'J PCD ' . $value['pcd'] . 'x' . $value['x_pcd'] . ' ET ' . $value['vilet'] . ' ЦО ' . $value['co'], ['/disk', 'brand' => $value['link_manufacturer'],
                                                'model' => $value['link_model'],
                                                'code77' => $value['code77'],
                                            ]) . '</td>';
                                            echo ' <td>' . number_format($value['price_roz'], 0, '', ' ') . ' руб.</td>';
                                            echo ' <td>' . $value['total'] . ' шт.</td>';
                                            //Какое кол-во добавлять в корзину
                                            $data_count = Basket::arr_drop($value['total']);
                                            //data_count=".$data_count['active']."
                                            echo ' <td><div data-count=' . $data_count['active'] . '  data-id=' . $value['id'] . ' data-brand=' . $value['manufacturer'] . ' data-article=' . $value['code77'] . '  data-nomenclature="disk" class="add_basket button1 pr_btn">
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


