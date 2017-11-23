<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\components\MyhelperComponent;

$this->title = 'Каталог шин';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$vendor = $data['vendor'];
$car = $data['mark'];
$year = $data['year'];
$modification = $data['modification'];
$zavod_shini = $params[0]['zavod_shini'];
$zamen_shini = $params[0]['zamen_shini'];
$tuning_shini = $params[0]['tuning_shini'];

$season_tyre = $data['season_tyre'];
?>

<div class="block_breadcrumbs">
    <?php
    echo Breadcrumbs::widget([
        'homeLink' => ['label' => 'Главная', 'url' => '/'],
        'links' => ["Подбор шин для автомобиля $vendor $car $year $modification"],
    ]);
    ?>
</div>


<div class="col-xs-3">
    <?= $this->render('/tyre/_left_form_tyre') ?>
</div>   

<div class="col-xs-9">
    <?php
    echo "<h3>Подбор дисков и шин для автомобиля <b>$vendor $car $year $modification</b><br><br>\r\n</h3>";
    echo "<TABLE BORDER=0>\r\n";
    echo "<TR><TD><b><center><h3>Параметры шин</h3></center></b></TD></TR>\r\n";

    if ($zavod_shini!= "") {
        echo "<TR><TD><b><center>заводская комплектация</center></b></TD></TR>\r\n";

        $zavod_shini_ = explode('|', $zavod_shini);

        for ($j = 0; $j < count($zavod_shini_); $j++) {
            $zavod_shini__ = explode('#', $zavod_shini_[$j]);
            if (count($zavod_shini__) >= 2) {
                $link_p = Yii::$app->myhelper->get_podbor_tyre($zavod_shini__[0]);
                $link_z = Yii::$app->myhelper->get_podbor_tyre($zavod_shini__[1]);
                echo
                "<TR><TD>передняя ось: " . Html::a($zavod_shini__[0], [
                    'tyre/search',
                    'brand' => 'ALL',
                    'season' => $season_tyre,
                    'shirina' => $link_p['shirina_tyre'],
                    'profil' => $link_p['profil_tyre'],
                    'diametr' => $link_p['diametr_tyre'],
                ]) . " задняя ось: " . Html::a($zavod_shini__[1], [
                    'tyre/search',
                    'brand' => 'ALL',
                    'season' => $season_tyre,
                    'shirina' => $link_z['shirina_tyre'],
                    'profil' => $link_z['profil_tyre'],
                    'diametr' => $link_z['diametr_tyre'],
                ]) . "</TD></TR>\r\n";
            } else {
                $link = Yii::$app->myhelper->get_podbor_tyre($zavod_shini_[$j]);
                echo "<TR><TD>" . Html::a($zavod_shini_[$j], [
                    'tyre/search',
                    'brand' => 'ALL',
                    'season' => $season_tyre,
                    'shirina' => $link['shirina_tyre'],
                    'profil' => $link['profil_tyre'],
                    'diametr' => $link['diametr_tyre'],
                ]) . "</TD></TR>\r\n";
            }
        }
    }

    if ($zamen_shini != "") {
        echo "<TR><TD><b><center>варианты замены</center></b></TD></TR>\r\n";

        $zamen_shini_ = explode('|', $zamen_shini);

        for ($j = 0; $j < count($zamen_shini_); $j++) {
            $zamen_shini__ = explode('#', $zamen_shini_[$j]);
            if (count($zamen_shini__) >= 2) {
                $link_p = Yii::$app->myhelper->get_podbor_tyre($zamen_shini__[0]);
                $link_z = Yii::$app->myhelper->get_podbor_tyre($zamen_shini__[1]);
                echo
                "<TR><TD>передняя ось: " . Html::a($zamen_shini__[0], [
                    'tyre/search',
                    'brand' => 'ALL',
                    'season' => $season_tyre,
                    'shirina' => $link_p['shirina_tyre'],
                    'profil' => $link_p['profil_tyre'],
                    'diametr' => $link_p['diametr_tyre'],
                ]) . " задняя ось: " . Html::a($zamen_shini__[1], [
                    'tyre/search',
                    'brand' => 'ALL',
                    'season' => $season_tyre,
                    'shirina' => $link_z['shirina_tyre'],
                    'profil' => $link_z['profil_tyre'],
                    'diametr' => $link_z['diametr_tyre'],
                ]) . "</TD></TR>\r\n";
            } else {
                $link = Yii::$app->myhelper->get_podbor_tyre($zamen_shini_[$j]);
                echo "<TR><TD>" . Html::a($zamen_shini_[$j], [
                    'tyre/search',
                    'brand' => 'ALL',
                    'season' => $season_tyre,
                    'shirina' => $link['shirina_tyre'],
                    'profil' => $link['profil_tyre'],
                    'diametr' => $link['diametr_tyre'],
                ]) . "</TD></TR>\r\n";
            }
        }
    }
    echo '<br>';
    if ($tuning_shini != "") {
        echo "<TR><TD><b><center>тюнинг</center></b></TD></TR>\r\n";
        $tuning_shini_ = explode('|', $tuning_shini);
        for ($j = 0; $j < count($tuning_shini_); $j++) {
            $tuning_shini__ = explode('#', $tuning_shini_[$j]);
            if (count($tuning_shini__) >= 2) {
                $link_p = Yii::$app->myhelper->get_podbor_tyre($tuning_shini__[0]);
                $link_z = Yii::$app->myhelper->get_podbor_tyre($tuning_shini__[1]);
                echo
                "<TR><TD>передняя ось: " . Html::a($tuning_shini__[0], [
                    'tyre/search',
                    'brand' => 'ALL',
                    'season' => $season_tyre,
                    'shirina' => $link_p['shirina_tyre'],
                    'profil' => $link_p['profil_tyre'],
                    'diametr' => $link_p['diametr_tyre'],
                ]) . " задняя ось: " . Html::a($tuning_shini__[1], [
                    'tyre/search',
                    'brand' => 'ALL',
                    'season' => $season_tyre,
                    'shirina' => $link_z['shirina_tyre'],
                    'profil' => $link_z['profil_tyre'],
                    'diametr' => $link_z['diametr_tyre'],
                ]) . "</TD></TR>\r\n";
            } else {
                $link = Yii::$app->myhelper->get_podbor_tyre($tuning_shini_[$j]);
                echo "<TR><TD>" . Html::a($tuning_shini_[$j], [
                    'tyre/search',
                    'brand' => 'ALL',
                    'season' => $season_tyre,
                    'shirina' => $link['shirina_tyre'],
                    'profil' => $link['profil_tyre'],
                    'diametr' => $link['diametr_tyre'],
                ]) . "</TD></TR>\r\n";
            }
        }
        #echo "<br><br>\r\n";
    }
    echo "</TABLE> \r\n";
    ?>
</div>