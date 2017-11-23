<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title>Магазин шин и дисков</title>
        <?php $this->head() ?>

        <!--  <meta name="description" content="" />-->
        <!-- <meta name = "viewport" content = "width = 1200">-->
        <!--  <meta name="viewport" content="width=device-width, initial-scale=1.0" />--> <!-- Для создание адаптивного дизайна -->
        <!-- <link rel="shortcut icon" href="favicon.png" />-->
        <!--  <link rel="icon" href="/img/favicon.ico" type="image/x-icon"/>-->

        <!--   <link rel="stylesheet" href="libs/bootstrap/bootstrap-grid-3.3.1.min.css" />--> <!-- Сетка  -->
        <!--  <link rel="stylesheet" href="libs/font-awesome-4.6.1/css/font-awesome.min.css" />--> <!-- Модуль шрифтов с иконками https://fortawesome.github.io/Font-Awesome/icons/ -->
        <!--  <link rel="stylesheet" href="css/main.css" />--> <!-- Стили  -->
        <!--  <script src="libs/jquery/jquery-1.11.1.min.js"></script>--> <!-- jquery  -->
       <!--   <script src="js/command.js"></script>--> <!-- jquery  код-->
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="wrapper">
            <!--
            <div class="attention">
                Cайт находится на реконструкции приносим свои извинения
            </div>
            -->
            <!--top-block -->
            <div class="context">
                <!--End top-block -->

                <!-- header -->
                <div class="container header">
                    <div class="row">
                        <div class="col-xs-4">
                            <br><br><br>
                            <?= $content ?>
                        </div>
                        <div class="col-xs-4">
                        </div>
                        <div class="col-xs-4"></div>
                    </div>
                </div>
            </div>
        </div><!-- end wrapper -->
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>