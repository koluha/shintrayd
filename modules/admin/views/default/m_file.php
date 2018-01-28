<?php

use mihaildev\elfinder\InputFile;
use mihaildev\elfinder\ElFinder;
use yii\web\JsExpression;

mihaildev\elfinder\Assets::noConflict($this);
?>
<div class="admin-default-index">
    <h2>Менеджер файлов</h2>
    <p><b>db_disk:</b> содержит картинки базы дисков</p>
    <p><b>db_tire:</b> содержит картинки базы шин</p>
    <?php
    echo ElFinder::widget([
        'language' => 'ru',
        'controller' => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
        //   'filter' => 'image', // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
        'callbackFunction' => new JsExpression('function(file, id){}') // id - id виджета
    ]);
    ?>
</div>