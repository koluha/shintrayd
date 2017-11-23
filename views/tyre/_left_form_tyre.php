<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\base\Tyre;
use app\models\base\Disk;
use yii\widgets\ActiveForm;
use app\models\base\Podbor;

$ob_tyre = new Tyre();
$ob_disk = new Disk();
$ob_podbor = new Podbor();
$session = Yii::$app->session;
?>

<h2>Подбор шин</h2>
<div class="left-filtr">

    <div class="left-title-filtr"> 
        <ul>
            <li class="first active"><a href="">По параметрам</a></li><li class="last"><a href="">По автомобилю</a></li>
        </ul>
    </div> 
    <!--left-filter-param-shina  -->
    <div class="left-filter-param-shina">
        <?php
        $form_param_shin_left = ActiveForm::begin(['action' => ['tyre/search'], 'id' => 'forum_post', 'method' => 'get',]);
        ?>
        <div class="block-param">
            <div class="parent-param-center">
                <div id="select-manufacturers">
                    <?= Html::dropDownList('brand', (isset($session['search_tyre']['brand'])) ? $session['search_tyre']['brand'] : '', $ob_tyre->BrandTyresDr(), ['class' => 'select select-248']); ?>
                </div>
            </div>
        </div>
        <div class="block-param">
            <div class="parent-param">
                <div class="left-sel-row">
                    <div class="left-params_section">
                        <!-- блок 1 -->
                        <div class="left-sel-section">
                            <div class="label_f">Ширина</div> 
                            <?= Html::dropDownList('shirina', (isset($session['search_tyre']['shirina'])) ? $session['search_tyre']['shirina'] : '', $ob_tyre->TyresShirinaDr(), ['id' => 'select-shirina_tyre']); ?>
                        </div>
                        <!-- блок 2 --> 
                        <span class="inline-help slash">/</span>
                        <div class="left-sel-section">
                            <div class="label_f">Высота</div> 
                            <?= Html::dropDownList('profil', (isset($session['search_tyre']['profil'])) ? $session['search_tyre']['profil'] : '', $ob_tyre->TyresProfilDr(), ['id' => 'select-shirina_tyre']); ?>
                        </div>
                        <!-- блок 3 -->
                        <span class="inline-help radius">R</span>
                        <div class="left-sel-section">
                            <div class="label_f">Диаметр</div> 
                            <?= Html::dropDownList('diametr', (isset($session['search_tyre']['diametr'])) ? $session['search_tyre']['diametr'] : '', $ob_tyre->TyresDiametrDr(), ['id' => 'select-shirina_tyre']); ?>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <div class="block-param">
            <div class="parent-param-center">
                <div class="left-ch-section">
                    <div class="check-block">
                        <div class="label_f"><b>Сезон</b></div>

                    </div>
                    <div class="check-block">
                        <?= Html::dropDownList('season', (isset($session['search_tyre']['season'])) ? $session['search_tyre']['season'] : 'W', $ob_tyre->TyresSeasonDrTop(), ['id' => 'select-season']); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-param">
            <div class="parent-param-center">
                <div class="left-ch-section">
                    <div class="check-block">
                        <?= Html::checkbox('spikes', (isset($session['search_tyre']['spikes'])) ? $session['search_tyre']['spikes'] : ''); ?>
                        <label class="icon-spikes" for="arrFilter_316_1532327238"><span>Шипы</span></label>
                    </div>
                    <div class="check-block">
                        <?= Html::checkbox('not_spikes', (isset($session['search_tyre']['not_spikes'])) ? $session['search_tyre']['not_spikes'] : ''); ?>
                        <label class="icon-not_spikes" for="arrFilter_316_1532327238"><span>Не шипы</span></label>
                    </div>
                    <div class="check-block">
                        <?= Html::checkbox('runflat', (isset($session['search_tyre']['runflat'])) ? $session['search_tyre']['runflat'] : ''); ?>
                        <label class="icon-flat" for="arrFilter_316_1532327238"><span>Run Flat</span></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-param">
            <div class="parent-param-center">
                <?= Html::submitButton('Подобрать', ['class' => 'button1 pick_up']) ?>
            </div>
        </div>
    </div>  
    <?php ActiveForm::end() ?>
    <!--left-filter-param-shina  -->

    <div class="left-filter-param-shina-auto">
        <div class="filt-body-d-left">
            <?php
            $form = ActiveForm::begin(['action' => ['podbor/search'], 'id' => 'form-filter-param-shina-auto-2', 'method' => 'get',]);
            echo Html::hiddenInput('form', 'tyre');
            ?>
            <div class="block-param">
                <?php
                echo Html::dropDownList('vendor', (isset($session['vendor_id_2'])) ? $session['vendor_id_2'] : '', $ob_podbor->Vendors(), [
                    'data-trigger' => 'dep-drop', //по этому атрибуту будем цеплять обработчик события onchange
                    'data-target' => '#select-mark-d', //этот атрибут нам нужен для получения индефикаторва элемента (тоже select) в котоорый нужно подставить ответ сервера после предварительной обработки
                    'data-url' => \yii\helpers\Url::to(['/podbor/mark']), //адрес по которому нужно обращаться за данными 
                    'data-name' => 'vendor_id', //атрибут в значении которого указано имя get параметра для передачи в действие гет параметра для передачи в действие контроллера  
                    'id' => 'select-vendor-d', // Индификатор css
                    'data-act' => 'act-disk',
                ])
                ?>

            </div>
            <div class="block-param">
                <?php
                //Получить список марок

                $select_mark = $ob_podbor->Mark($session['vendor_id_2']);

                echo Html::dropDownList('mark', (isset($session['mark_id_2'])) ? $session['mark_id_2'] : '', $select_mark, [
                    'data-trigger' => 'dep-drop', //по этому атрибуту будем цеплять обработчик события onchange
                    'data-target' => '#select-year-d', //этот атрибут нам нужен для получения индефикаторва элемента (тоже select) в котоорый нужно подставить ответ сервера после предварительной обработки
                    'data-url' => \yii\helpers\Url::to(['/podbor/year']), //адрес по которому нужно обращаться за данными 
                    'data-name' => 'mark_id', //атрибут в значении которого указано имя get параметра для передачи в действие гет параметра для передачи в действие контроллера  
                    'id' => 'select-mark-d', // Индификатор css
                    'data-act' => 'act-disk',
                ])
                ?>
            </div>
            <div class="block-param">
                <?php
                //Получить список годов

                $select_year = $ob_podbor->Year($session['vendor_id_2'], $session['mark_id_2']);

                echo Html::dropDownList('year', (isset($session['year_id_2'])) ? $session['year_id_2'] : '', $select_year, [
                    'data-trigger' => 'dep-drop', //по этому атрибуту будем цеплять обработчик события onchange
                    'data-target' => '#select-modification-d', //этот атрибут нам нужен для получения индефикаторва элемента (тоже select) в котоорый нужно подставить ответ сервера после предварительной обработки
                    'data-url' => \yii\helpers\Url::to(['/podbor/modification']), //адрес по которому нужно обращаться за данными 
                    'data-name' => 'year_id', //атрибут в значении которого указано имя get параметра для передачи в действие гет параметра для передачи в действие контроллера  
                    'id' => 'select-year-d', // Индификатор css
                    'data-act' => 'act-disk',
                ])
                ?>
            </div>
            <div class="block-param">
                <?php
                $select_modification = $ob_podbor->Modification($session['vendor_id_2'], $session['mark_id_2'], $session['year_id_2']);

                echo Html::dropDownList('modification', (isset($session['modification_id_2'])) ? $session['modification_id_2'] : '', $select_modification, [
                    'data-trigger' => 'dep-drop',
                    'data-url' => \yii\helpers\Url::to(['/podbor/last']),
                    'data-name' => 'modification_id', //атрибут в значении которого указано имя get параметра для передачи в действие гет параметра для передачи в действие контроллера  
                    'id' => 'select-modification-d', // Индификатор css
                    'data-act' => 'act-disk',
                ])
                ?>
            </div>
            <div class="parent-param-center">
                <?= Html::submitButton('Подобрать', ['id' => 'button_p_1', 'class' => 'button1 pick_up', 'disabled' => 'disabled']) ?>

            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>