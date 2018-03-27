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

$this->title = '';
$meta_description = '';
$meta_keywords = '';

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
?>
<!-- main-filter-tabs (основной блок фильтр) -->
<div class="container main-filter-tabs">
    <div class="row">
        <div class="col-xs-6 no-margin padding-right">
            <!-- filt-title (заголовок основной блок фильтр) -->
            <div class="filt-title">
                <div class="tag-filtr-title">
                    <h1>Подбор шин</h1>
                    <ul>
                        <li  class="first active"><a href="">По параметрам</a></li>
                        <li  class="last"><a href="">По автомобилю</a></li>
                    </ul>
                </div>
            </div>
            <!-- end filt-title (заголовок основной блок фильтр) -->
            <!-- filter-param-shina (фильтр по параметру шины) Блок переключатель-->
            <div class="filter-param-shina">
                <!-- filt-body (тело основной блок фильтр) -->
                <?php
                $form_param_shin_2 = ActiveForm::begin(['action' => ['tyre/search'], 'id' => 'forum_post', 'method' => 'get',]);
                ?>
                <div class="filt-body">
                    <!-- sel-row-line (два селекта в строку) -->
                    <div class="sel-row-line">
                        <div class="left-col">
                            <div id="select-manufacturers">
                                <?= Html::dropDownList('brand', (isset($session['search_tyre']['brand'])) ? $session['search_tyre']['brand'] : '', $ob_tyre->BrandTyresDr(), ['id' => 'select-bus-manufacturers']); ?>
                            </div>
                        </div>
                        <div class="right-col">
                            <div id="select-season">
                                <?= Html::dropDownList('season', (isset($session['search_tyre']['season'])) ? $session['search_tyre']['season'] : $ob_tyre->switch_drop(), $ob_tyre->TyresSeasonDr(), ['id' => 'select-bus-manufacturers']); ?>
                            </div>
                        </div>
                        <div class="sel-row">
                            <!-- params_section (параметры селекта) -->
                            <div class="params_section">
                                <div class="sel-section">
                                    <div class="label_f">Ширина</div> 
                                    <?= Html::dropDownList('shirina', (isset($session['search_tyre']['shirina'])) ? $session['search_tyre']['shirina'] : '', $ob_tyre->TyresShirinaDr(), ['id' => 'select-shirina_tyre']); ?>
                                </div>
                                <span class="inline-help slash">/</span>
                                <div class="sel-section">
                                    <div class="label_f">Высота</div> 
                                    <?= Html::dropDownList('profil', (isset($session['search_tyre']['profil'])) ? $session['search_tyre']['profil'] : '', $ob_tyre->TyresProfilDr(), ['id' => 'select-shirina_tyre']); ?>
                                </div>
                                <span class="inline-help radius">R</span>
                                <div class="sel-section">
                                    <div class="label_f">Диаметр</div> 
                                    <?= Html::dropDownList('diametr', (isset($session['search_tyre']['diametr'])) ? $session['search_tyre']['diametr'] : '', $ob_tyre->TyresDiametrDr(), ['id' => 'select-shirina_tyre']); ?>
                                </div>
                            </div>
                            <!-- params_section (параметры селекта) -->
                        </div>
                    </div>
                    <!-- sel-row-line (два селекта в строку) -->
                    <!-- ch-section (чеки) -->
                    <div class="ch-section">
                        <!--   <div class="check-block">
                               <input type="checkbox" name="arrFilter_312_743589328" id="arrFilter_312_743589328" value="Y">						
                               <label class="icon-winter" for="arrFilter_312_3042645098">
                                   <span>Зимние</span>
                               </label>
                           </div>
                           <div class="check-block">
                               <input type="checkbox" name="arrFilter_312_3042645098" id="arrFilter_312_3042645098" value="Y">						
                               <label class="icon-summer" for="arrFilter_312_3042645098">
                                   <span>Летние</span>
                               </label>
                           </div>
                        -->
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
                    <!-- ch-section (чеки) -->
                    <div class="but-row">
                        <?= Html::submitButton('Подобрать', ['class' => 'button1 pick_up']) ?>
                       <!--   <button class="button1 pick_up" type="submit" name="box_type" value="params"><span>Подобрать</span></button>-->
                    </div>
                </div>
                <?php ActiveForm::end() ?>
                <!-- end filt-body (тело основной блок фильтр) -->
            </div>
            <!-- end filter-param-shina (фильтр по параметру шины) -->

            <div class="filter-param-shina-auto">
                <div class="filt-body">
                    <?php
                    $form_shina_auto = ActiveForm::begin(['action' => ['podbor/search'], 'id' => 'form-filter-param-shina-auto-1', 'method' => 'get',]);
                    echo Html::hiddenInput('form', 'tyre');
                    ?>
                    <div class="filt-body-par">
                        <div class="form-line">

                            <div class="form-line-title">Подбор шин по автомобилю</div> 
                            <!--   <div class="form-line-title">Производитель</div> -->
                            <?php
                            echo Html::dropDownList('vendor', (isset($session['vendor_id_1'])) ? $session['vendor_id_1'] : '', $ob_podbor->Vendors(), [
                                'data-trigger' => 'dep-drop', //по этому атрибуту будем цеплять обработчик события onchange
                                'data-target' => '#select-mark', //этот атрибут нам нужен для получения индефикаторва элемента (тоже select) в котоорый нужно подставить ответ сервера после предварительной обработки
                                'data-url' => \yii\helpers\Url::to(['/podbor/mark']), //адрес по которому нужно обращаться за данными 
                                'data-name' => 'vendor_id', //атрибут в значении которого указано имя get параметра для передачи в действие гет параметра для передачи в действие контроллера  
                                'id' => 'select-vendor', // Индификатор css
                                'data-act' => 'act-tyre',
                            ])
                            ?>
                            </select>
                        </div>
                        <div class="form-line">
                            <!--   <div class="form-line-title">Марка</div>-->
                            <?php
                            //Получить список марок

                            $select_mark = $ob_podbor->Mark($session['vendor_id_1']);

                            echo Html::dropDownList('mark', (isset($session['mark_id_1'])) ? $session['mark_id_1'] : '', $select_mark, [
                                'data-trigger' => 'dep-drop', //по этому атрибуту будем цеплять обработчик события onchange
                                'data-target' => '#select-year', //этот атрибут нам нужен для получения индефикаторва элемента (тоже select) в котоорый нужно подставить ответ сервера после предварительной обработки
                                'data-url' => \yii\helpers\Url::to(['/podbor/year']), //адрес по которому нужно обращаться за данными 
                                'data-name' => 'mark_id', //атрибут в значении которого указано имя get параметра для передачи в действие гет параметра для передачи в действие контроллера  
                                'id' => 'select-mark', // Индификатор css
                                'data-act' => 'act-tyre',
                            ])
                            ?>
                        </div>
                        <div class="form-line">
                            <!--  <div class="form-line-title">Год выпуска:</div>-->
                            <?php
                            //Получить список годов

                            $select_year = $ob_podbor->Year($session['vendor_id_1'], $session['mark_id_1']);

                            echo Html::dropDownList('year', (isset($session['year_id_1'])) ? $session['year_id_1'] : '', $select_year, [
                                'data-trigger' => 'dep-drop', //по этому атрибуту будем цеплять обработчик события onchange
                                'data-target' => '#select-modification', //этот атрибут нам нужен для получения индефикаторва элемента (тоже select) в котоорый нужно подставить ответ сервера после предварительной обработки
                                'data-url' => \yii\helpers\Url::to(['/podbor/modification']), //адрес по которому нужно обращаться за данными 
                                'data-name' => 'year_id', //атрибут в значении которого указано имя get параметра для передачи в действие гет параметра для передачи в действие контроллера  
                                'id' => 'select-year', // Индификатор css
                                'data-act' => 'act-tyre',
                            ])
                            ?>
                        </div>
                        <div class="form-line">
                            <!--  <div class="form-line-title">Модификация:</div>-->
                            <?php
                            $select_modification = $ob_podbor->Modification($session['vendor_id_1'], $session['mark_id_1'], $session['year_id_1']);

                            echo Html::dropDownList('modification', (isset($session['modification_id_1'])) ? $session['modification_id_1'] : '', $select_modification, [
                                'data-trigger' => 'dep-drop',
                                'data-url' => \yii\helpers\Url::to(['/podbor/last']),
                                'data-name' => 'modification_id', //атрибут в значении которого указано имя get параметра для передачи в действие гет параметра для передачи в действие контроллера  
                                'id' => 'select-modification', // Индификатор css
                                'data-act' => 'act-tyre',
                            ])
                            ?>
                        </div>
                    </div>
                    <div class="but-row">
                        <?= Html::submitButton('Подобрать', ['id' => 'button_p_1', 'class' => 'button1 pick_up', 'disabled' => 'disabled']) ?>
                        <!--<button class="button1 pick_up" type="submit" name="box_type" value="params"><span>Подобрать</span></button> -->
                    </div>
                </div>
                <?php ActiveForm::end() ?>
            </div>

        </div>
        <div class="col-xs-6 no-margin padding-left">
            <!-- filt-title (заголовок основной блок фильтр) -->
            <div class="filt-title">
                <div class="tag-filtr-title tag-filtr-title-disk">
                    <h1>Подбор дисков</h1>
                    <ul>
                        <li  class="first active"><a href="">По параметрам</a></li>
                        <li  class="last"><a href="">По автомобилю</a></li>
                    </ul>
                </div>
            </div>
            <div class="filter-param-disk">
                <!-- filt-body (тело основной блок фильтр) -->
                <div class="filt-body-d">
                    <?php
                    $form_param_disk = ActiveForm::begin(['action' => ['disk/search'], 'id' => 'forum_post', 'method' => 'get',]);
                    ?>
                    <!-- sel-row-line (два селекта в строку) -->
                    <div class="sel-row-line">
                        <div class="left-col">
                            <div id="select-manufacturers">
                                <?= Html::dropDownList('manufacturer', (isset($session['search_disk']['manufacturer'])) ? $session['search_disk']['manufacturer'] : '', $ob_disk->BrandDisksDr(), ['id' => 'select-bus-manufacturers']); ?>
                            </div>
                        </div>
                        <div class="right-col">
                            <div id="select-season">
                                <?= Html::dropDownList('type', (isset($session['search_disk']['type'])) ? $session['search_disk']['type'] : '', $ob_disk->TypeDisksDr(), ['id' => 'select-bus-manufacturers']); ?>
                            </div>
                        </div>
                        <div class="sel-row">
                            <!-- params_section (параметры селекта) -->
                            <div class="params_section_disk str">
                                <div class="sel-section">
                                    <div class="label_f">Диаметр </div> 
                                    <?= Html::dropDownList('diametr', (isset($session['search_disk']['diametr'])) ? $session['search_disk']['diametr'] : '', $ob_disk->DiametrDiskDr()); ?>
                                </div>
                                <span class="inline-help slash">X</span>
                                <div class="sel-section">
                                    <div class="label_f">Ширина</div> 
                                    <?= Html::dropDownList('diametr_width', (isset($session['search_disk']['diametr_width'])) ? $session['search_disk']['diametr_width'] : '', $ob_disk->Diametr_widthDiskDr()); ?>
                                </div>
                                <span class="inline-help slash">&nbsp;</span>
                                <div class="sel-section">
                                    <div class="label_f">Вылет ET</div> 
                                    <?= Html::dropDownList('et', (isset($session['search_disk']['et'])) ? $session['search_disk']['et'] : '', $ob_disk->EtDiskDr()); ?>
                                </div>
                            </div>
                            <div class="params_section_disk">
                                <div class="sel-section">
                                    <div class="label_f">PCD</div> 
                                    <?= Html::dropDownList('pcd', (isset($session['search_disk']['pcd'])) ? $session['search_disk']['pcd'] : '', $ob_disk->PcdDiskDr()); ?>
                                </div>
                                <span class="inline-help slash">X</span>
                                <div class="sel-section">
                                    <div class="label_f">&nbsp;</div> 
                                    <?= Html::dropDownList('x_cd', (isset($session['search_disk']['x_cd'])) ? $session['search_disk']['x_cd'] : '', $ob_disk->XpcdDiskDr()); ?>
                                </div>

                                <span class="inline-help slash">&nbsp;</span>
                                <div class="sel-section">
                                    <div class="label_f">ЦО (DIO)</div> 
                                    <?= Html::dropDownList('co', (isset($session['search_disk']['co'])) ? $session['search_disk']['co'] : '', $ob_disk->CoDiskDr()); ?>
                                </div>

                            </div>
                            <!-- params_section (параметры селекта) -->

                            <div class="but-row">
                                <?= Html::submitButton('Подобрать', ['class' => 'button1 pick_up']) ?>

       <!-- <button class="button1 pick_up" type="submit" name="box_type" value="params"><span>Подобрать</span></button> -->
                            </div>
                        </div>
                    </div>
                    <?php ActiveForm::end() ?>
                    <!-- sel-row-line (два селекта в строку) -->


                </div>
                <!-- end filt-body (тело основной блок фильтр) -->
            </div>



            <!-- end filt-title (заголовок основной блок фильтр) -->
            <div class="filter-param-disk-auto" style="display: none;">
                <div class="filt-body-d">
                    <?php
                    $form_param_shina_auto = ActiveForm::begin(['action' => ['podbor/search'], 'id' => 'form-filter-param-shina-auto-2', 'method' => 'get',]);
                    echo Html::hiddenInput('form', 'disk');
                    ?>
                    <div class="filt-body-par">

                        <div class="form-line">

                            <div class="form-line-title">Подбор колесных дисков по автомобилю</div> 
                            <!--   <div class="form-line-title">Производитель</div> -->
                            <?php
                            echo Html::dropDownList('vendor', (isset($session['vendor_id_2'])) ? $session['vendor_id_2'] : '', $ob_podbor->Vendors(), [
                                'data-trigger' => 'dep-drop', //по этому атрибуту будем цеплять обработчик события onchange
                                'data-target' => '#select-mark-d', //этот атрибут нам нужен для получения индефикаторва элемента (тоже select) в котоорый нужно подставить ответ сервера после предварительной обработки
                                'data-url' => \yii\helpers\Url::to(['/podbor/mark']), //адрес по которому нужно обращаться за данными 
                                'data-name' => 'vendor_id', //атрибут в значении которого указано имя get параметра для передачи в действие гет параметра для передачи в действие контроллера  
                                'id' => 'select-vendor-d', // Индификатор css
                                'data-act' => 'act-disk'
                            ])
                            ?>

                        </div>
                        <div class="form-line">
                            <!--   <div class="form-line-title">Марка</div>-->
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
                        <div class="form-line">
                            <!--  <div class="form-line-title">Год выпуска:</div>-->
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
                        <div class="form-line">
                            <!--  <div class="form-line-title">Модификация:</div>-->
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
                    </div>
                    <div class="but-row">
                        <?= Html::submitButton('Подобрать', ['id' => 'button_p_1', 'class' => 'button1 pick_up', 'disabled' => 'disabled']) ?>
                        <!--<button class="button1 pick_up" type="submit" name="box_type" value="params"><span>Подобрать</span></button> -->
                    </div>
                </div>
                <?php ActiveForm::end() ?>
            </div>




        </div>


    </div>
</div>
<!-- end main-filter-tabs (основной блок фильтр) -->

<div class="container">
    <div class="row">
        <h1>Интернет-магазин автомобильных шин и дисков N-TYRE.NET</h1>

        <p>Компания &laquo;N-TYRE&raquo; создана для профессиональной помощи автолюбителям. На нашем сайте Вы можете ознакомиться со спектром услуг, оказываемых нашей компанией. Наши специалисты создали уникальную систему помощи в поиске шин разных категорий всех мировых брендов. У нас Вы сможете найти и приобрести по разумным ценам любые интересующие Вас покрышки из всех каталогов: автошины, мотошины, шины для грузовых машин, шины для спецтехники.</p>
        <p>Мы постарались максимально учесть пожелания покупателей. Наши специалисты готовы помочь Вам решить все вопросы по подбору и покупке шин или дисков. Для этого достаточно просто позвонить нам по телефонам горячей линии.</p>
        <p><span style="font-size: 14px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></p>


        <div  class="left-col">
            <h1>Расшифровка параметров шин</h1>
            <img  style="width: 106%" src="/img/unnamed.jpg"> 
        </div>

        <div class="right-col">
            <h1>Расшифровка параметров дисков</h1>
            <img  src="/img/img_1325.jpg"> 
        </div>

    </div>
</div>

