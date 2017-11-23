<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div id="sticky" class="sticky-element"> <!-- BEGIN sticky -->
    <div class="sticky-anchor"></div>
    <?php
    $form_param_disk_top = ActiveForm::begin(['action' => ['disk/search'], 'id' => 'forum_post', 'method' => 'get',]);
    ?>
    <div class="sticky-content clearfix">
        <div class="nav-filtr-block  clearfix">

            <div class="nav-filtr-in clearfix">
                <div class="nav-filrr-body">
                    <div class="nav-param">
                        <span class="tit_param">Диаметр</span>
                        <?= Html::dropDownList('diametr', (isset($session['search_disk']['diametr'])) ? $session['search_disk']['diametr'] : '', $ob_disk->DiametrDiskDr()); ?>
                    </div>
                    <div class="nav-param">
                        <span class="tit_param">Ширина</span>
                        <?= Html::dropDownList('diametr_width', (isset($session['search_disk']['diametr_width'])) ? $session['search_disk']['diametr_width'] : '', $ob_disk->Diametr_widthDiskDr()); ?>
                    </div>
                    <div class="nav-param">
                        <span class="tit_param">Вылет ЕТ</span>
                        <?= Html::dropDownList('et', (isset($session['search_disk']['et'])) ? $session['search_disk']['et'] : '', $ob_disk->EtDiskDr()); ?>
                    </div>
                </div>
                <div class="nav-filrr-body">
                    <div class="nav-param">
                        <span class="tit_param">PCD</span>
                        <?= Html::dropDownList('pcd', (isset($session['search_disk']['pcd'])) ? $session['search_disk']['pcd'] : '', $ob_disk->PcdDiskDr()); ?>
                    </div>
                    <div class="nav-param">
                        <span class="tit_param"></span>
                        <?= Html::dropDownList('x_cd', (isset($session['search_disk']['x_cd'])) ? $session['search_disk']['x_cd'] : '', $ob_disk->XpcdDiskDr()); ?>
                    </div>
                </div>
                <div class="nav-filrr-body">
                    <div class="nav-param">
                        <span class="tit_param">ЦО(DIO)</span>
                        <?= Html::dropDownList('co', (isset($session['search_disk']['co'])) ? $session['search_disk']['co'] : '', $ob_disk->CoDiskDr()); ?>
                    </div>
                </div>
                <div class="nav-button">
                    <button class="button1 btn-gor" type="submit"><span>Подобрать</span></button>
                </div>
                <div class="add-settings">
                    <a href="#">Расширенные настройки</a>
                </div>
            </div>
        </div>

        <!-- Скрытый блог расширенной навигаций -->
        <div class="nav-filtr-block add-settings-nav-filtr-block clearfix">
            <div class="nav-filtr-in clearfix">
                <div class="nav-filrr-body">
                    <div class="nav-param">
                        <?= Html::dropDownList('manufacturer', (isset($session['search_disk']['manufacturer'])) ? $session['search_disk']['manufacturer'] : '', $ob_disk->BrandDisksDr(), ['id' => 'select-bus-manufacturers']); ?>
                    </div>
                </div>
                <div class="nav-filrr-body">
                    <div class="nav-param">
                        <span class="tit_param">Тип</span>
                        <?= Html::dropDownList('type', (isset($session['search_disk']['type'])) ? $session['search_disk']['type'] : '', $ob_disk->TypeDisksDrTop(), ['id' => 'select-type']); ?>
                    </div>
                </div>

                <div class="nav-filrr-body">
                    <div class="nav-param">
                        <span class="tit_param">Цвет </span>
                        <?= Html::dropDownList('color', (isset($session['search_disk']['color'])) ? $session['search_disk']['color'] : '', $ob_disk->ColorDiskDr(), ['id' => 'select-bus-manufacturers']); ?>
                    </div>
                </div>
            </div>
        </div> 

    </div>
    <?php ActiveForm::end() ?>
</div><!-- END sticky -->
