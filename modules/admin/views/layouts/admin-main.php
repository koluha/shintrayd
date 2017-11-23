<?php

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
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => 'Панель Администратора',
                'brandUrl' => Url::toRoute('default/index'),
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Заказы', 'url' => ['/admin/order/index']],
                    ['label' => 'Загрузка прайса', 'url' => ['/admin/file/index']],
                    ['label' => 'Спецификация шин', 'url' => ['/admin/speciftire/index']],
                    ['label' => 'Спецификация дисков', 'url' => ['/admin/specifdisk/index']],
                    Yii::$app->getModule('admin')->get('admin')->isGuest ? (
                            ['label' => 'Вход', 'url' => ['/admin/default/adminlogin']]
                            ) : (
                            '<li>'
                            . Html::beginForm(['/admin/default/logout'], 'post')
                            . Html::submitButton(
                                    'Выход (' . Yii::$app->getModule('admin')->get('admin')->identity->username . ')', ['class' => 'btn btn-link logout']
                            )
                            . Html::endForm()
                            . '</li>'
                            )
                ],
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">

            </div>
        </footer>

        <?php $this->endBody() ?>
        <div id="bg"></div>
    </body>
</html>
<?php $this->endPage() ?>
