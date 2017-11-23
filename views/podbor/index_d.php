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

$pcd = $params[0]['pcd'];
$diametr = $params[0]['diametr'];
$gaika = $params[0]['gaika'];

$zavod_diskov = $params[0]['zavod_diskov'];
$zamen_diskov = $params[0]['zamen_diskov'];
$tuning_diski = $params[0]['tuning_diski'];
?>

<div class="block_breadcrumbs">
    <?php
    echo Breadcrumbs::widget([
        'homeLink' => ['label' => 'Главная', 'url' => '/'],
        'links' => ["Подбор колесных дисков для автомобиля $vendor $car $year $modification"],
    ]);
    ?>
</div>


<div class="col-xs-3">
    <?= $this->render('/disk/_left_form_disk') ?>
</div>   

<div class="col-xs-9">
    <?php
    echo "<h3>Подбор дисков и шин для автомобиля <b>$vendor $car $year $modification</b><br><br>\r\n</h3>";
    echo "<TABLE BORDER=0>\r\n";

    echo "<TR><TD><b><center>Параметры дисков</center></b></TD></TR>\r\n";
    echo "<TR><TD>PCD: $pcd; диаметр: $diametr; $gaika</TD></TR>\r\n";


    if ($zavod_diskov != "") {
        echo "<TR><TD><center>заводская комплектация</center></TD></TR>\r\n";
        $zavod_diskov_ = explode('|', $zavod_diskov);
        for ($j = 0; $j < count($zavod_diskov_); $j++) {
            $zavod_diskov__ = explode('#', $zavod_diskov_[$j]);
            if (count($zavod_diskov__) >= 2) {
                $dw_0 = Yii::$app->myhelper->podbor_diametr_width($zavod_diskov__[0]);
                $dw_1 = Yii::$app->myhelper->podbor_diametr_width($zavod_diskov__[1]);
                $co_disk = Yii::$app->myhelper->podbor_point($diametr);
                $pcd_res = Yii::$app->myhelper->podbor_pcd($pcd);
                echo "<TR><TD>передняя ось: " .
                Html::a($zavod_diskov__[0], [
                    'disk/search',
                    'manufacturer' => 'ALL',
                    'type' => 'ALL',
                    'diametr' => $dw_0['diametr'],
                    'diametr_width' => $dw_0['width'],
                    //'et_disk' => '',//Не учитываем при поиске по авто
                    'pcd' => $pcd_res['pcd'],
                    'x_cd' => $pcd_res['x_pcd'],
                    'co' => $co_disk,
                ])
                . " задняя ось: " .
                Html::a($zavod_diskov__[1], [  //manufacturer_disk=ALL&type_disk=Stalnoy&diametr_disk=16&diametr_width_disk=7.0&et_disk=47&pcd_disk=5&x_cd_disk=120&co_disk=72.6
                    'disk/search',
                    'manufacturer' => 'ALL',
                    'type' => 'ALL',
                    'diametr' => $dw_1['diametr'],
                    'diametr_width' => $dw_1['width'],
                    //'et_disk' => '',//Не учитываем при поиске по авто
                    'pcd' => $pcd_res['pcd'],
                    'x_cd' => $pcd_res['x_pcd'],
                    'co' => $co_disk,
                ])
                . "</TD></TR>\r\n";
            } else {
                $dw = Yii::$app->myhelper->podbor_diametr_width($zavod_diskov_[$j]);
                $co_disk = Yii::$app->myhelper->podbor_point($diametr);
                $pcd_res = Yii::$app->myhelper->podbor_pcd($pcd);

                echo "<TR><TD>" .
                Html::a($zavod_diskov_[$j], [
                    'disk/search',
                    'manufacturer' => 'ALL',
                    'type' => 'ALL',
                    'diametr' => $dw['diametr'],
                    'diametr_width' => $dw['width'],
                    //'et_disk' => '',//Не учитываем при поиске по авто
                    'pcd' => $pcd_res['pcd'],
                    'x_cd' => $pcd_res['x_pcd'],
                    'co' => $co_disk,
                ])
                . "</TD></TR>\r\n";
            }
        }
        #echo "<br><br>\r\n";
    }



    if ($zamen_diskov != "") {
        echo "<TR><TD><center>варианты замены</center></TD></TR>\r\n";
        $zamen_diskov_ = explode('|', $zamen_diskov);
        for ($j = 0; $j < count($zamen_diskov_); $j++) {
            $zamen_diskov__ = explode('#', $zamen_diskov_[$j]);
            if (count($zamen_diskov__) >= 2) {
                $dw_0 = Yii::$app->myhelper->podbor_diametr_width($zamen_diskov__[0]);
                $dw_1 = Yii::$app->myhelper->podbor_diametr_width($zamen_diskov__[1]);
  
                $co_disk = Yii::$app->myhelper->podbor_point($diametr);
                $pcd_res = Yii::$app->myhelper->podbor_pcd($pcd);
                echo "<TR><TD>передняя ось: " .
                Html::a($zamen_diskov__[0], [
                    'disk/search',
                    'manufacturer' => 'ALL',
                    'type' => 'ALL',
                    'diametr' => $dw_0['diametr'],
                    'diametr_width' => Yii::$app->myhelper->podbor_j($dw_0['width']),
                    //'et_disk' => '',//Не учитываем при поиске по авто
                    'pcd' => $pcd_res['pcd'],
                    'x_cd' => $pcd_res['x_pcd'],
                    'co' => $co_disk,
                ])
                . " задняя ось: " .
                Html::a($zamen_diskov__[1], [  //manufacturer_disk=ALL&type_disk=Stalnoy&diametr_disk=16&diametr_width_disk=7.0&et_disk=47&pcd_disk=5&x_cd_disk=120&co_disk=72.6
                    'disk/search',
                    'manufacturer' => 'ALL',
                    'type' => 'ALL',
                    'diametr' => $dw_1['diametr'],
                    'diametr_width' => Yii::$app->myhelper->podbor_j($dw_1['width']),
                    //'et_disk' => '',//Не учитываем при поиске по авто
                    'pcd' => $pcd_res['pcd'],
                    'x_cd' => $pcd_res['x_pcd'],
                    'co' => $co_disk,
                ])
                . "</TD></TR>\r\n";
            } else {
                $dw = Yii::$app->myhelper->podbor_diametr_width($zamen_diskov_[$j]);
                $co_disk = Yii::$app->myhelper->podbor_point($diametr);
                $pcd_res = Yii::$app->myhelper->podbor_pcd($pcd);

                echo "<TR><TD>" .
                Html::a($zamen_diskov_[$j], [
                    'disk/search',
                    'manufacturer' => 'ALL',
                    'type' => 'ALL',
                    'diametr' => $dw['diametr'],
                    'diametr_width' => Yii::$app->myhelper->podbor_j($dw['width']),
                    //'et_disk' => '',//Не учитываем при поиске по авто
                    'pcd' => $pcd_res['pcd'],
                    'x_cd' => $pcd_res['x_pcd'],
                    'co' => $co_disk,
                ])
                . "</TD></TR>\r\n";
            }
        }
        #echo "<br><br>\r\n";
    }



    if ($tuning_diski != "") {
        echo "<TR><TD><center>тюнинг</center></TD></TR>\r\n";
        $tuning_diski_ = explode('|', $tuning_diski);
        for ($j = 0; $j < count($tuning_diski_); $j++) {
            $tuning_diski__ = explode('#', $tuning_diski_[$j]);
            if (count($tuning_diski__) >= 2) {
                $dw_0 = Yii::$app->myhelper->podbor_diametr_width($tuning_diski__[0]);
                $dw_1 = Yii::$app->myhelper->podbor_diametr_width($tuning_diski__[1]);
  
                $co_disk = Yii::$app->myhelper->podbor_point($diametr);
                $pcd_res = Yii::$app->myhelper->podbor_pcd($pcd);
                echo "<TR><TD>передняя ось: " .
                Html::a($tuning_diski__[0], [
                    'disk/search',
                    'manufacturer' => 'ALL',
                    'type' => 'ALL',
                    'diametr' => $dw_0['diametr'],
                    'diametr_width' => Yii::$app->myhelper->podbor_j($dw_0['width']),
                    //'et_disk' => '',//Не учитываем при поиске по авто
                    'pcd' => $pcd_res['pcd'],
                    'x_cd' => $pcd_res['x_pcd'],
                    'co' => $co_disk,
                ])
                . " задняя ось: " .
                Html::a($tuning_diski__[1], [  //manufacturer_disk=ALL&type_disk=Stalnoy&diametr_disk=16&diametr_width_disk=7.0&et_disk=47&pcd_disk=5&x_cd_disk=120&co_disk=72.6
                    'disk/search',
                    'manufacturer' => 'ALL',
                    'type' => 'ALL',
                    'diametr' => $dw_1['diametr'],
                    'diametr_width' => Yii::$app->myhelper->podbor_j($dw_1['width']),
                    //'et_disk' => '',//Не учитываем при поиске по авто
                    'pcd' => $pcd_res['pcd'],
                    'x_cd' => $pcd_res['x_pcd'],
                    'co' => $co_disk,
                ])
                . "</TD></TR>\r\n";
            } else {
                $dw = Yii::$app->myhelper->podbor_diametr_width($tuning_diskov_[$j]);
                $co_disk = Yii::$app->myhelper->podbor_point($diametr);
                $pcd_res = Yii::$app->myhelper->podbor_pcd($pcd);

                echo "<TR><TD>" .
                Html::a($tuning_diskov_[$j], [
                    'disk/search',
                    'manufacturer' => 'ALL',
                    'type' => 'ALL',
                    'diametr' => $dw['diametr'],
                    'diametr_width' => Yii::$app->myhelper->podbor_j($dw['width']), 
                    //'et_disk' => '',//Не учитываем при поиске по авто
                    'pcd' => $pcd_res['pcd'],
                    'x_cd' => $pcd_res['x_pcd'],
                    'co' => $co_disk,
                ])
                . "</TD></TR>\r\n";
            }
        }
        #echo "<br><br>\r\n";
    }

    echo "</TABLE> \r\n";

    ?>
</div>