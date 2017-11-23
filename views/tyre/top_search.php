<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div id="sticky" class="sticky-element"> <!-- BEGIN sticky -->
    <div class="sticky-anchor"></div>
    <?php
    $form_param_shin_top = ActiveForm::begin(['action' => ['tyre/search'], 'id' => 'forum_post', 'method' => 'get',]);
    ?>
    <div class="sticky-content clearfix">
        <div class="nav-filtr-block  clearfix">

            <div class="nav-filtr-in clearfix">
                <div class="nav-filrr-body">
                    <div class="nav-param">
                        <span class="tit_param">Сезон</span>
                        <?= Html::dropDownList('season', (isset($session['search_tyre']['season'])) ? $session['search_tyre']['season'] : '', $ob_tyre->TyresSeasonDrTop(), ['id' => 'select-season']); ?>
                    </div>
                </div>

                <div class="nav-filrr-body">
                    <div class="cheks-gor-item ">

                        <div class="nav-param">
                            <?= Html::checkbox('spikes', (isset($session['search_tyre']['spikes'])) ? $session['search_tyre']['spikes'] : ''); ?>
                            <label class="icon-spikes" >
                                <span>Шипы</span>
                            </label>
                        </div>	 
                        <div class="nav-param padding-left">
                            <?= Html::checkbox('not_spikes', (isset($session['search_tyre']['not_spikes'])) ? $session['search_tyre']['not_spikes'] : ''); ?>
                            <label class="icon-not_spikes" >
                                <span>Не шипы</span>
                            </label>
                        </div>	
                        <div class="nav-param padding-left">
                            <?= Html::checkbox('runflat', (isset($session['search_tyre']['runflat'])) ? $session['search_tyre']['runflat'] : ''); ?>
                            <label class="icon-flat" >
                                <span>Run Flat</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="nav-filrr-body">
                    <div class="nav-param">
                        <span class="tit_param">Ширина</span>
                        <?= Html::dropDownList('shirina', (isset($session['search_tyre']['shirina'])) ? $session['search_tyre']['shirina'] : '', $ob_tyre->TyresShirinaDr(), ['id' => 'select-shirina_tyre']); ?>
                    </div>
                    <div class="nav-param">
                        <span class="tit_param">Высота</span>
                        <?= Html::dropDownList('profil', (isset($session['search_tyre']['profil'])) ? $session['search_tyre']['profil'] : '', $ob_tyre->TyresProfilDr(), ['id' => 'select-shirina_tyre']); ?>
                    </div>
                    <div class="nav-param">
                        <span class="tit_param">Диаметр</span>
                        <?= Html::dropDownList('diametr', (isset($session['search_tyre']['diametr'])) ? $session['search_tyre']['diametr'] : '', $ob_tyre->TyresDiametrDr(), ['id' => 'select-shirina_tyre']); ?>
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
                        <?= Html::dropDownList('brand', (isset($session['search_tyre']['brand'])) ? $session['search_tyre']['brand'] : '', $ob_tyre->BrandTyresDr(), ['id' => 'select-bus-manufacturers']); ?>
                    </div>
                </div>
                <!--
                <div class="nav-filrr-body">
                    <div class="cheks-gor-item">
                        <div class="nav-param">
                            <div class="cheks-bloks-type-auto">
                                <input type="checkbox">
                                <label class="icon-sedan" >
                                    <span>Легковой</span>
                                </label>
                            </div>
                            <div class="cheks-bloks-type-auto">
                                <input type="checkbox">
                                <label class="icon-djip" >
                                    <span>Джип</span>
                                </label>
                            </div>
                            <div class="cheks-bloks-type-auto">
                                <input type="checkbox">
                                <label class="icon-gruzovoy" >
                                    <span>Грузовой</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                -->
                <div class="nav-filrr-body">
                    <div class="nav-param">
                        <span class="tit_param">Индекс максимальной скорости </span>
                        <?= Html::dropDownList('coef_speed', (isset($session['search_tyre']['coef_speed'])) ? $session['search_tyre']['coef_speed'] : '', $ob_tyre->In_speedTyresDr()); ?>
                    </div>
                </div>
            </div>
        </div> 

    </div>
    <?php ActiveForm::end() ?>
</div><!-- END sticky -->
