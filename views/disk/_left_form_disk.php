<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\base\Tyre;
use app\models\base\Disk;
use yii\widgets\ActiveForm;
use app\models\base\Podbor;

$ob_disk = new Disk();
$ob_podbor = new Podbor();
$session = Yii::$app->session;
?>

<h2>Подбор дисков</h2>
<div class="left-filtr">
    <div class="left-title-filtr-disk"> 
        <ul>
            <li class="first active"><a href="">По параметрам</a></li><li class="last"><a href="">По автомобилю</a></li>
        </ul>
    </div> 
    <!--left-filter-param-disk -->
    <?php
                    $form_param_disk_left = ActiveForm::begin(['action' => ['disk/search'], 'id' => 'forum_post', 'method' => 'get',]);
                    ?>
    <div class="left-filter-param-disk">
        <div class="block-param">
            <div class="parent-param-center">
                <div id="select-manufacturers">
                    <?= Html::dropDownList('manufacturer', (isset($session['search_disk']['manufacturer'])) ? $session['search_disk']['manufacturer'] : '', $ob_disk->BrandDisksDr(), ['class' => 'select select-248']); ?>
                </div>
            </div>
        </div>
        <div class="block-param">
            <div class="parent-param-center">
                <div id="select-manufacturers">
                    <?= Html::dropDownList('type', (isset($session['search_disk']['type'])) ? $session['search_disk']['type'] : '', $ob_disk->TypeDisksDr(), ['class' => 'select select-248']); ?>
                </div>
            </div>
        </div>
        <div class="block-param">
            <div class="parent-param">
                <div class="left-sel-row">
                    <div class="left-params_section">
                        <!-- блок 1 -->
                        <div class="left-sel-section">
                            <div class="label_f">Диаметр</div> 
                            <?= Html::dropDownList('diametr', (isset($session['search_disk']['diametr'])) ? $session['search_disk']['diametr'] : '', $ob_disk->DiametrDiskDr()); ?>
                        </div>
                        <!-- блок 2 --> 
                        <span class="inline-help slash">X</span>
                        <div class="left-sel-section">
                            <div class="label_f">Ширина</div> 
                            <?= Html::dropDownList('diametr_width', (isset($session['search_disk']['diametr_width'])) ? $session['search_disk']['diametr_width'] : '', $ob_disk->Diametr_widthDiskDr()); ?>
                        </div>
                        <div class="left-sel-section">
                            <div class="label_f">Вылет ЕТ</div> 
                            <?= Html::dropDownList('et', (isset($session['search_disk']['et'])) ? $session['search_disk']['et'] : '', $ob_disk->EtDiskDr()); ?>
                        </div>
                    </div> 
                </div>
            </div>
        </div>

        <div class="block-param">
            <div class="parent-param">
                <div class="left-sel-row">
                    <div class="left-params_section">
                        <!-- блок 1 -->
                        <div class="left-sel-section">
                            <div class="label_f">PCD</div> 
                            <?= Html::dropDownList('pcd', (isset($session['search_disk']['pcd'])) ? $session['search_disk']['pcd'] : '', $ob_disk->PcdDiskDr()); ?>
                        </div>
                        <!-- блок 2 --> 
                        <span class="inline-help slash">X</span>
                        <div class="left-sel-section">
                            <div class="label_f"> </div> 
                            <?= Html::dropDownList('x_cd', (isset($session['search_disk']['x_cd'])) ? $session['search_disk']['x_cd'] : '', $ob_disk->XpcdDiskDr()); ?>
                        </div>
                        <!-- блок 3 --> 
                        <span class="inline-help slash"></span>
                        <div class="left-sel-section">
                            <div class="label_f">ЦО (DIO)</div> 
                            <?= Html::dropDownList('co', (isset($session['search_disk']['co'])) ? $session['search_disk']['co'] : '', $ob_disk->CoDiskDr()); ?>
                        </div>
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
    <!--left-filter-param-disk  -->

    <div class="left-filter-param-disk-auto">
        <div class="filt-body-d-left">
            <?php
            $form = ActiveForm::begin(['action' => ['podbor/search'], 'id' => 'form-filter-param-shina-auto-2', 'method' => 'get',]);
            echo Html::hiddenInput('form', 'disk');
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