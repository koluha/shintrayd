<?php
//Эти константы уберем, когда все сделаем
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

//Автолодер компосера
require(__DIR__ . '/../vendor/autoload.php');
//Загрузка ядра
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
 //Подключение конфига
$config = require(__DIR__ . '/../config/web.php');

//Передача конфига в приложение
//Экзекуция run()
(new yii\web\Application($config))->run();
