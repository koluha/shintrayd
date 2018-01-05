<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\models\base\Tyre;

$this->title = 'Шины ' . strtoupper($data['brand']);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block_breadcrumbs">
<?php
echo Breadcrumbs::widget([
    'homeLink' => ['label' => 'Главная', 'url' => '/'],
    'links' => [
        [ 'label' => 'Каталог шин',
            'url' => ['/tyre/index'],
        ],
        ucfirst(strtolower($data['brand'])),
    ],
]);
?>
</div>
<div class="col-xs-3">
<?= $this->render('_left_form_tyre') ?>
</div>   
<div class="col-xs-9">

    <div class="h_cat_line clearfix">
        <h1> <h1><?= Html::encode($this->title) ?></h1></h1>

        <div class="cat-link_2 img_155x42_toyo"></div>

    </div>


<?php
foreach ($data['date_models'] as $value) {
    if ($value['model']) {
        echo '<ul class="catalog_base_inner">';
        echo '<li>';
        echo ' <div class="catalog-it-inner">';
        $season = '';
        if ($value['season'] == 'S') {
            $season = '<label class="icon-summer" for="arrFilter_312_3042645098"></label>';
        } elseif ($value['season'] == 'W') {
            $season = '<label class="icon-winter"></label>';
        } {
            
        }
        
        $image = Tyre::getImgTyre($value['model']);
        
        $text = $season . '
                    <div class="img-cat"><img src="'.$image.'" width="155" alt=""></div>
                    <div class="caption">
                        <span>' . strtoupper($value['brand']) . ' ' . strtoupper($value['model']) . '</span>
                    </div>';
        $option = ['class' => 'cat-link_1 cat-link_1_pop'];
        echo Html::a($text, ['tyre/index', 'brand' => $value['link_brand'], 'season' => $value['season'], 'model' => $value['link_model']], $option);
        echo '</li>';
        echo '</ul>';
    }
}
?>



    <!--
        <ul class="catalog_base_inner">
            <li>
                <div class="catalog-it-inner">
                    <a href="#" class="cat-link_1 cat-link_1_pop">
                        <label class="icon-summer" for="arrFilter_312_3042645098"></label>
                        <div class="img-cat">
                            <img src="/img/bfgoodrich-all-terrain.jpg" width="155" 
                                 alt="Шины Toyo">
                        </div>
    
                        <div class="caption">
                            <span>Michelin Pilot Sport 4 S</span>
                        </div>
                    </a>
                </div>
            </li>
        </ul>
    -->
</div>



