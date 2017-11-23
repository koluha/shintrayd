<?php
$script = <<< JS
        
  /* Если файл выбран то скрываем список загруженых файлов*/     
   $('input[name="DbSpecifDisk[picture]"]').on('change', function(event, files, label) {
    var file_name = this.value;
        if(file_name){
                 $('select[name="DbSpecifDisk[list_img]"]').attr('disabled',true); 
        }else {
                $('select[name="DbSpecifDisk[list_img]"]').attr('disabled',false); 
}
});
/* При выборе select записываем значение в скрытое поле */
$('select[name="DbSpecifDisk[list_img]"]').on('change', function(event, files, label) {
sel=$('select[name="DbSpecifDisk[list_img]"]');
if(sel.val()){    
$('#list_img_val').attr('value', $(this).find('option:selected').text())   
}else {
  $('#list_img_val').removeAttr('value');
}    
});
        
        
/* Если файл выбран то скрываем список загруженых файлов*/     
   $('input[name="DbSpecifDisk[picture_1]"]').on('change', function(event, files, label) {
    var file_name = this.value;
        if(file_name){
                 $('select[name="DbSpecifDisk[list_imgs_1]"]').attr('disabled',true); 
        }else {
                $('select[name="DbSpecifDisk[list_imgs_1]"]').attr('disabled',false); 
}
});
/* При выборе select доп_1 записываем значение в скрытое поле, при первом эл-те val = null */
$('select[name="DbSpecifDisk[list_imgs_1]"]').on('change', function(event, files, label) {
sel_1=$('select[name="DbSpecifDisk[list_imgs_1]"]');
if(sel_1.val()){
$('#list_imgs_1_val').attr('value', $(this).find('option:selected').text());
}else {
  $('#list_imgs_1_val').removeAttr('value');
}
});
        
        
/* Если файл выбран то скрываем список загруженых файлов*/     
$('input[name="DbSpecifDisk[picture_2]"]').on('change', function(event, files, label) {
    var file_name = this.value;
        if(file_name){
                 $('select[name="DbSpecifDisk[list_imgs_2]"]').attr('disabled',true); 
        }else {
                $('select[name="DbSpecifDisk[list_imgs_2]"]').attr('disabled',false); 
}
});
/* При выборе select доп_2 записываем значение в скрытое поле, при первом эл-те val = null */
$('select[name="DbSpecifDisk[list_imgs_2]"]').on('change', function(event, files, label) {
sel_2=$('select[name="DbSpecifDisk[list_imgs_2]"]');
if(sel_2.val()){
$('#list_imgs_2_val').attr('value', $(this).find('option:selected').text());
}else {
  $('#list_imgs_2_val').removeAttr('value');
}
});       
        
    $('input[name="DbSpecifDisk[picture_3]"]').on('change', function(event, files, label) {
    var file_name = this.value;
        if(file_name){
                 $('select[name="DbSpecifDisk[list_imgs_3]"]').attr('disabled',true); 
        }else {
                $('select[name="DbSpecifDisk[list_imgs_3]"]').attr('disabled',false); 
}
});
/* При выборе select доп_3 записываем значение в скрытое поле, при первом эл-те val = null */
$('select[name="DbSpecifDisk[list_imgs_3]"]').on('change', function(event, files, label) {
sel_3=$('select[name="DbSpecifDisk[list_imgs_3]"]');
if(sel_3.val()){
$('#list_imgs_3_val').attr('value', $(this).find('option:selected').text());
}else {
  $('#list_imgs_3_val').removeAttr('value');
}
});           
JS;

$this->registerJs($script, yii\web\View::POS_READY);
?>


<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\models\base\DbSpecifDisk;

/* @var $this yii\web\View */
/* @var $model app\models\DbSpecifDisk */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="db-specif-disk-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'code_product')->textInput(['maxlength' => true])->label('Код товара') ?>
    <?= $form->field($model, 'vendor_key')->dropDownList(DbSpecifDisk::getVendorindisk_all())->label('Производитель *') ?>
    <?= $form->field($model, 'name')->textInput(['rows' => 6])->label('Наименование') ?>
    <?= $form->field($model, 'name_short')->textInput(['rows' => 6])->label('Наименование сокращенное') ?>
    <?= $form->field($model, 'product_name')->textInput(['rows' => 6])->label('Наименование продукта') ?>




    <!-- Форма загрузки основной картинки --> <br><br>
    <?php
    // if (isset($model->picture) && file_exists(Yii::getAlias('@webroot/img/db_disk/', $model->picture))) {  //Возможно нужно расширение установить
    //     echo Html::img(Url::toRoute('/img/db_disk/' . $model->picture . '.jpg'), ['class' => 'img-resp']);
    //     echo $form->field($model, 'del_img')->checkBox(['class' => 'span-1']);
    // }
    ?>

    <!-- Форма загрузки дополнительной картинки -->

    <?php
    //Если редактирование покажем картинку_1
    // if (isset($model->imgs) && file_exists(Yii::getAlias('@webroot/img/db_disk/', $model->imgs))) {
    //    $res_form = $model->arr_imgs($model->imgs);
    //   foreach ($res_form as $value) {
    //      echo Html::img(Url::toRoute('/img/db_disk/' . $value . '.jpg'), ['class' => 'img-resp']);
    //     echo $form->field($model, 'del_img')->checkBox(['class' => 'span-1']);
    //}
    //}
    ?>

    <?php
    //Из строки картинок получим массив [0]=>картинка_1, [1]=>картинка_2, [2]=>картинка_3
    if (isset($model->imgs)) {
        $arr_imgs = DbSpecifDisk::arr_imgs($model->imgs);
    }
    ?>

    <div class="alert-warning alert fade in">
        <?php
        if ($model->img && file_exists(Yii::getAlias('@webroot/img/db_disk/', $model->img))) {
            echo '<label class="control-label" for="dbspecifdisk-picture">Основная картинка</label>';
            echo Html::img(Url::toRoute('/img/db_disk/' . $model->img . '.jpg'), ['class' => 'img-resp']);
            echo $form->field($model, 'del_img')->checkBox(['class' => 'span-1']);
        } elseif (!$model->img) {
            echo '<label class="control-label" for="dbspecifdisk-picture">Основной картинки не существует</label>';
        }
        ?>
        <?= $form->field($model, 'picture')->fileInput()->label($model->isNewRecord ? 'Добавить основную картинку' : 'Изменить основную картинку'); ?>
        <?= $form->field($model, 'list_img')->dropDownList(DbSpecifDisk::get_img_all(), ['prompt' => 'Выберите основную картинку ...'])->label($model->isNewRecord ? 'Добавить основную картинку из уже ранее загруженных' : 'Или изменить основную картинку из уже ранее загруженных') ?>
        <?= $form->field($model, 'list_img_val')->hiddenInput(['id' => 'list_img_val'])->label(false) ?> <!-- скрытое поле имя выбранного списка -->
    </div>

    <div class="alert-warning alert fade in">
        <?php
        if ($arr_imgs[0] && file_exists(Yii::getAlias('@webroot/img/db_disk/', $arr_imgs[0]))) {
            echo '<label class="control-label" for="dbspecifdisk-picture">Дополнительная картинка 1</label>';
            echo Html::img(Url::toRoute('/img/db_disk/' . $arr_imgs[0] . '.jpg'), ['class' => 'img-resp']);
            echo $form->field($model, 'del_img_1')->checkBox(['class' => 'span-1']);
        } elseif (!$arr_imgs[0]) {
            echo '<label class="control-label" for="dbspecifdisk-picture">Дополнительной картинки 1 не существует</label>';
        }
        ?>
        <?= $form->field($model, 'picture_1')->fileInput()->label($model->isNewRecord ? 'Добавить дополнительную картинка 1' : 'Изменить дополнительную картинка 1'); ?>
        <?= $form->field($model, 'list_imgs_1')->dropDownList(DbSpecifDisk::img_s_all(), ['prompt' => 'Выберите дополнительную картинку 1 ...'])->label($model->isNewRecord ? 'Добавить дополнительную картинку 1 из уже ранее загруженных' : 'Или изменить дополнительную картинку 1 из уже ранее загруженных'); ?>
        <?= $form->field($model, 'list_imgs_1_val')->hiddenInput(['id' => 'list_imgs_1_val'])->label(false) ?> <!-- скрытое поле имя выбранного списка -->
    </div>    

    <div class="alert-warning alert fade in">
        <?php
        if ($arr_imgs[1] && file_exists(Yii::getAlias('@webroot/img/db_disk/', $arr_imgs[1]))) {
            echo '<label class="control-label" for="dbspecifdisk-picture">Дополнительная картинка 2</label>';
            echo Html::img(Url::toRoute('/img/db_disk/' . $arr_imgs[1] . '.jpg'), ['class' => 'img-resp']);
            echo $form->field($model, 'del_img_2')->checkBox(['class' => 'span-1']);
        } elseif (!$arr_imgs[1]) {
            echo '<label class="control-label" for="dbspecifdisk-picture">Дополнительной картинки 2 не существует</label>';
        }
        ?>
        <?= $form->field($model, 'picture_2')->fileInput()->label($model->isNewRecord ? 'Добавить дополнительную картинка 2' : 'Изменить дополнительную картинка 2'); ?>
        <?= $form->field($model, 'list_imgs_2')->dropDownList(DbSpecifDisk::img_s_all(), ['prompt' => 'Выберите дополнительную картинку 2 ...'])->label($model->isNewRecord ? 'Добавить дополнительную картинку 2 из уже ранее загруженных' : 'Или изменить дополнительную картинку 2 из уже ранее загруженных'); ?>
        <?= $form->field($model, 'list_imgs_2_val')->hiddenInput(['id' => 'list_imgs_2_val'])->label(false) ?> <!-- скрытое поле имя выбранного списка -->
    </div>

    <div class="alert-warning alert fade in">
        <?php
        if ($arr_imgs[2] && file_exists(Yii::getAlias('@webroot/img/db_disk/', $arr_imgs[2]))) {
            echo '<label class="control-label" for="dbspecifdisk-picture">Дополнительная картинка 3</label>';
            echo Html::img(Url::toRoute('/img/db_disk/' . $arr_imgs[2] . '.jpg'), ['class' => 'img-resp']);
            echo $form->field($model, 'del_img_3')->checkBox(['class' => 'span-1']);
        } elseif (!$arr_imgs[2]) {
            echo '<label class="control-label" for="dbspecifdisk-picture">Дополнительной картинки 3 не существует</label>';
        }
        ?>
        <?= $form->field($model, 'picture_3')->fileInput()->label($model->isNewRecord ? 'Добавить дополнительную картинка 3' : 'Изменить дополнительную картинка 3'); ?>
        <?= $form->field($model, 'list_imgs_3')->dropDownList(DbSpecifDisk::img_s_all(), ['prompt' => 'Выберите дополнительную картинку 3 ...'])->label($model->isNewRecord ? 'Добавить дополнительную картинку 3 из уже ранее загруженных' : 'Или изменить дополнительную картинку 3 из уже ранее загруженных'); ?>
        <?= $form->field($model, 'list_imgs_3_val')->hiddenInput(['id' => 'list_imgs_3_val'])->label(false) ?> <!-- скрытое поле имя выбранного списка -->
    </div>

    <?= $form->field($model, 'imgs')->hiddenInput(['id' => 'imgs'])->label(false) ?> <!-- скрытое поле имя поля imgs списка -->

    
   
    <?= $form->field($model, 'p_1')->dropDownList(DbSpecifDisk::get_arr_param(1),['prompt' => '...'])->label('Количество крепежных отверстий ') ?>  
    <?= $form->field($model, 'p_2')->dropDownList(DbSpecifDisk::get_arr_param(2),['prompt' => '...'])->label('Диаметр центрального отверстия ') ?>  
    <?= $form->field($model, 'p_3')->dropDownList(DbSpecifDisk::get_arr_param(3),['prompt' => '...'])->label('Вылет (ET)') ?>  
    <?= $form->field($model, 'p_4')->dropDownList(DbSpecifDisk::get_arr_param(4),['prompt' => '...'])->label('Диаметр расположения отверстий (PCD)') ?>  
    <?= $form->field($model, 'p_5')->dropDownList(DbSpecifDisk::get_arr_param(5),['prompt' => '...'])->label('Вес') ?>  
    <?= $form->field($model, 'p_6')->dropDownList(DbSpecifDisk::get_arr_param(6),['prompt' => '...'])->label('Ширина обода') ?>  
    <?= $form->field($model, 'p_7')->dropDownList(DbSpecifDisk::get_arr_param(7),['prompt' => '...'])->label('Диаметр обода') ?>  
    <?= $form->field($model, 'p_8')->dropDownList(DbSpecifDisk::get_arr_param(8),['prompt' => '...'])->label('Тип') ?>  
    <?= $form->field($model, 'p_9')->dropDownList(DbSpecifDisk::get_arr_param(9),['prompt' => '...'])->label('Материал') ?>  
    <?= $form->field($model, 'p_10')->dropDownList(DbSpecifDisk::get_arr_param(10),['prompt' => '...'] )->label('Цвет') ?>  
    


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>

