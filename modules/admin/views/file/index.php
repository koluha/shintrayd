<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\JqueryFormAsset;

JqueryFormAsset::register($this);  // $this - представляет собой объект представления

$bs = Url::toRoute(['/admin/file', 'pid' => '']);
$script = <<< JS
        var baseUrl = '$bs',
	pid = $pid
        
    $('#add-price').click(function() {
           console.log(baseUrl);
	    $('#bg').show();
	    $('#add-price-dialog').show();
	    $('#add-price-dialog input[name="name"]').focus();
	});
	
	$('#bg').click(function() {
	    $('#bg').hide();
	    $('#add-price-dialog').hide().find('input[type="text"]').val('');
	});

	$('#add-price-dialog form').ajaxForm({
	    dataType: 'json',
	    beforeSubmit: function (d, f) {
		var form = $(f),
		    val = form.find('input[name="name"]').val();
		form.find('.err').html('');
		form.find('input[name="name"]').removeClass('error');
		if (val == '') {
		    form.find('.err').html('Поле "Название" не может быть пустым');
		    form.find('input[name="name"]').addClass('error');
		    return false;
		}
	    },
	    success: function(d) {
		var form = $('#add-price-dialog form');
		if (!d.error) {
		    document.location.href = baseUrl+d.pid;
		} else {
		    form.find('.err').html(d.msg);
		    form.find('input[name="name"]').addClass('error');
		}
	    }
	});
	
	$('#upload-price-form').ajaxForm({
	    dataType: 'json',
	    beforeSubmit: function (d, f) {
		var form = $(f),
		    type = form.find('input[name="type"]:checked').val(),
		    file = form.find('input[name="price"]').val(),
                    ch_price_tyre = $('input[name="ch_price_tyre"]').prop('checked');
                    ch_price_disk = $('input[name="ch_price_disk"]').prop('checked');
                    
		form.find('label').removeClass('error');
		form.find('input[name="price"]').removeClass('error');

		if ((ch_price_tyre==false) && (ch_price_disk==false)) {
		    alert("Вы должны указать номенклатуру загружаемого файла (шины или диски)");
                    return false;
		 }
        
               if (file == '') {
		    alert("Вы должны указать файл");
		    form.find('input[name="price"]').addClass('error');
                    return false;
		}
        
		$('#bg').unbind('click');
		$('#bg').show();
		$('#upload-status').show();
		return true;
	    },
	    success: function(d) {
                console.log(d) ;
		$('#bg').hide();
		$('#upload-status').hide();
		$('#bg').click(function() {
		    $('#bg').hide();
		    $('#add-price-dialog').hide().find('input[type="text"]').val('');
		});
		if (!d.error) {
		    document.location.reload();
		} else {
		    $('#err-flash').html(d.msg).show();
		    setTimeout(function() {
			$('#err-flash').fadeOut(300);
		    }, 5000);
		}
	    }
	});
	
	$('.pr-delete').click(function() {
	    var name = $(this).attr('name');
	    return confirm("Будет удален прайс,продолжить?");
	});
        
        $('input[name="ch_price_tyre"]').change(function() {
	    $('input[name="ch_price_disk"]').removeAttr("checked");
         });
        $('input[name="ch_price_disk"]').change(function() {
	    $('input[name="ch_price_tyre"]').removeAttr("checked");
	});
JS;

$this->registerJs($script, yii\web\View::POS_READY);
?>

<div id="err-flash">Текст сообщения</div>
<section id="prices">
    <fieldset>
        <div>
            <div class="left">
                <form class="form-inline" method="POST" enctype="multipart/form-data" id="upload-price-form" action="<? echo Url::toRoute('/admin/file/uploadprice') ?>">
                    <fieldset><legend>Форма загрузки</legend>
                        <input type="hidden" name="pid" value="<? echo $pid ?>"/>
                        <input class="btn btn-primary" type="file" name="price"/><br>
                        <label>Шины</label>&nbsp;&nbsp;<input type="checkbox" name="ch_price_tyre" ><br>
                        <label>Диски</label>&nbsp;&nbsp;<input type="checkbox" name="ch_price_disk" ><br><br>
                        <input class="btn" type="submit" value="Загрузить прайс" <?php if ($pid == 0) echo 'disabled' ?> />
                    </fieldset>
                </form>
            </div>
            <div class="mt10 right">
                <br><br><br><br><br><br><br>
                <input type="button" class="btn"  value="Добавить прайс" id="add-price"/>&nbsp;
            </div>
            <div class="both"></div>
            <div class="mt5">
                <table class="table" cellpadding="0" cellspacing="2">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Тип прайса</th>
                            <th>Пользователь</th>
                            <th>Создан</th>
                            <th>Обновлён</th>
                            <th>Кол-во</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($priceList as $i => $price): ?>
                            <tr class="<?php if ($i % 2 == 0) echo 'gray' ?> <?php if ($pid == $price['pid']) echo 'active' ?>" >
                                <td><? echo $price['pid'] ?></td>
                                <td><? echo $price['name'] ?></td>
                                <td><?php echo app\models\base\TbPrices::gettypename($price['type']) ?></td>
                                <td><? echo $price['login'] ?></td>
                                <td><? echo $price['created'] ?></td>
                                <td><? echo $price['updated'] ?></td>
                                <td><?php 
                                $e=app\models\base\TbPrices::getAllPrices_count($price['type'],$price['pid']); 
                                echo $e['parts_count'];
                                ?></td>
                                <td><a href="<? echo Url::toRoute(['/admin/file', 'pid' => $price['pid']]) ?>">Выбрать</a></td>
                                <td><a name="<? echo $price['name'] ?>" class="pr-delete" href="<? echo Url::toRoute(['/admin/file/deleteprice', 'pid' => $price['pid']]) ?>">Удалить</a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </fieldset>
</section>
<div id="upload-status">
    <div>Идёт загрузка<br>Пожалуйста, подождите</div>
    <img width="128" height="128" src="<? echo Url::base() . '/img/al.gif' ?>" />
</div>
<div id="add-price-dialog">
    <form method="POST" action="<? echo Url::toRoute('/admin/file/createprice') ?>">
        <div>
            <div class="err"></div>
            <span class="t75">Название нового прайса:</span>
            <br>
            <input  class="input" type="text" name="name"/>
            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
        </div>
        <br>
        <div class="mt10">
            <input class="btn btn-info" type="submit" value="Создать"/>
        </div>
    </form>

</div>

