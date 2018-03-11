<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\FrontAsset;
use yii\helpers\Url;
use app\models\Basket;
use yii\bootstrap\Carousel;

FrontAsset::register($this);


$carousel = [
    [
        'content' => '<img src="/img/slide-1247x392.jpg"/>',
        'caption' => '<div class="slade_shin"><h1>Шины и диски</h1><p>большой выбор продукций</p><p><a href="/article/link/1" class="btn btn-primary">Подробнее <span class="glyphicon glyphicon-chevron-right"></a></p></div>',
        'options' => ['class' => 'slade_shin','text-align' => 'left']
    ],
    [
        'content' => '<img src="/img/avtoservis.jpg"/>',
        'caption' => '<h1>Автосервис</h1><p> услуги по ремонту и обслуживанию автомобилей</p>',
        'options' => ['class' => 'slade_avtoservis']
    ],
    [
        'content' => '<img src="/img/shino.jpg"/>',
        'caption' => '<h1>Шиномонтаж</h1><p>Полный комплекс услуг по работе с колесами</p>',
        'options' => ['class' => 'slade_shino_montag']
    ]
];
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <?= Html::csrfMetaTags() ?>

        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">



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
                <div class="top-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="menu_header">
                                    <ul> 	
                                        <li><a href="<?php echo Url::toRoute('site/contact'); ?>">Контакты</a></li>
                                        <li  class="active"><a href="<?php echo Url::toRoute('site/news'); ?>">Новости</a></li>
                                        <li><a href="<?php echo Url::toRoute('site/services'); ?>">Услуги</a></li>
                                        <li><a href="<?php echo Url::toRoute('site/delivery'); ?>">Доставка</a></li>
                                        <li><a href="<?php echo Url::toRoute('site/questions_answers'); ?>">Вопросы и ответы</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="block_user">
                                    <ul>
                                        <?php
                                        /*
                                          if (Yii::$app->user->isGuest) {
                                          echo "<i class = 'fa fa-user' aria-hidden = 'true'></i>
                                          <li><a href = '" . Url::toRoute('user/registration') . "'>Регистрация</a></li>
                                          <i class = 'fa fa-arrow-circle-right' aria-hidden = 'true'></i>
                                          <li><a href = '" . Url::toRoute('user/login') . "'>Войти</a></li>";
                                          } else {
                                          echo "<i class = 'fa fa-user' aria-hidden = 'true'></i>
                                          <li><a href = '" . Url::toRoute('user/profile') . "'>Личный кабинет (" . Yii::$app->user->identity->username . ")</a></li>";
                                          echo "<i class = 'fa fa-user' aria-hidden = 'true'></i>
                                          <li><a href = '" . Url::toRoute('user/logout') . "'>Выход</a></li>";
                                          }
                                         * 
                                         */
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End top-block -->

                <!-- header -->
                <div class="container header">
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="logo">
                                <a href="<?php echo Url::toRoute('site/index'); ?>"><img src="/img/logos.jpg"></a>
                                <span>Интернет-магазин шин и дисков</span>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="phone-line"><span>+7 (906) </span>753-00-88</div>
                            <div class="phone-line"><span>+7 (906) </span>752-00-88</div>
                        </div>
                        <div class="col-xs-4">
                            <div class="ti_adress">
                                Москва,<br> 2-ая Карачаровская д.1 cтр.1 
                            </div>
                            <div class="payment">
                                <img src="/img/payment.png">
                            </div>
                        </div>
                        <?php
                        $basket = new Basket;
                        ?>
                        <div class="col-xs-2 block-basket">
                            <img src="/img/basket.png"  alt="Корзина">  
                            <div class="cart_text">
                                <a href="<?php echo Url::toRoute('basket/index'); ?>"><p class="t_basket">Корзина</p></a>
                                <div id='basket_info'>  
                                    <p> <span class="b"><?php echo $basket->count() ?></span> товара</p>
                                    <p> на <span class="r"><?php echo number_format($basket->sumTotal(), 0, '', ' ') ?> руб.</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container menu">
                    <!-- menu (Горизонтальное меню) -->
                    <div class="menu">
                        <div class="row">
                            <div class="col-xs-8">
                                <ul>
                                    <li class="<?php echo Yii::$app->controller->id == 'tyre' ? 'active1' : ''; ?>"><a href="<?php echo Url::toRoute('tyre/index'); ?>">Шины</a></li>
                                    <li class="<?php echo Yii::$app->controller->id == 'disk' ? 'active1' : ''; ?>"><a href="<?php echo Url::toRoute('disk/index'); ?>">Диски</a></li>
                                    <li class="<?php echo Yii::$app->controller->action->id == 'mounting' ? 'active1' : ''; ?>"><a href="<?php echo Url::toRoute('site/mounting'); ?>">Шиномонтаж</a></li>
                                    <li class="<?php echo Yii::$app->controller->action->id == 'autoservice' ? 'active1' : ''; ?>"><a href="<?php echo Url::toRoute('site/autoservice'); ?>">Автосервис </a></li>
                                    <li class="<?php echo Yii::$app->controller->action->id == 'accessories' ? 'active1' : ''; ?>"><a href="<?php echo Url::toRoute('site/accessories'); ?>">Аксессуары</a></li>
                                    <li class="<?php echo Yii::$app->controller->action->id == 'contact' ? 'active1' : ''; ?>"><a href="<?php echo Url::toRoute('site/contact'); ?>">Контакты</a></li>
                                </ul>
                            </div>
                            <div class="col-xs-4">
                                <form action="/site/search" method="get" class="search_form">
                                    <input type="search" name="article" placeholder="Поиск по артикулу">
                                    <input type="submit" value="">
                                </form>
                            </div>

                        </div>
                    </div>
                    <!-- end menu (Горизонтальное меню) -->
                </div>


                <div class="container">
                    <div class="row">
                        <!-- slider (Слайдер) -->
                        <div class="slider">
                            <?php
                            echo Carousel::widget([
                                'items' => $carousel,
                                'options' => ['class' => 'carousel slide', 'data-interval' => '30000'],
                                'controls' => [
                                    '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>',
                                    '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'
                                ]
                            ]);
                            ?>
                        </div>
                        <!-- end slider (Слайдер) -->
                    </div>
                </div>
                <div class="container context_base">
                    <div class="row">

                        <?= $content ?>

                    </div>
                </div>
            </div><!-- end Context -->

            <div class="footer">
                <div class="inline">

                </div>
                <div class="container ">
                    <div class="row line_footer ">
                        <div class="col-xs-6">
                            <div class="logo">
                                <a href="#" class="white">n-tyre.net</a>
                                <span >Интернет-магазин шин и дисков</span>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="fl_contact">
                                <ul class="fl_contact_list">
                                    <li><span>Телефоны:</span><a href="">+7 (499) 391-91-88</a></li>
                                    <li><a href="">+7 (906) 752-00-88</a></li>
                                    <li><a href="">+7 (906) 753-00-88</a></li>
                                    <li><span>Email:</span><a href="">shintrayd@bk.ru</a></li>
                                </ul>
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="footer_wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-3">
                                <div class="fw_title">ШИНЫ</div>
                                <ul class="fw_list">
                                    <!--
                                    <li><a href="#">Зимние шины</a></li>
                                    <li><a href="#">Летние шины</a></li>
                                    <li><a href="#">Шины легковые</a></li>
                                    <li><a href="#">Шины грузовые</a></li>
                                    -->
                                    <li><a href="<?php echo Url::toRoute('tyre/index'); ?>">Каталог шин</a></li>
                                    <li><a href="<?php echo Url::toRoute('site/recycling'); ?>">Утилизация шин</a></li>
                                </ul>
                            </div>
                            <div class="col-xs-3">
                                <div class="fw_title">ДИСКИ</div>
                                <ul class="fw_list">
                                    <!--
                                   <li><a href="#">Подбор дисков по автомобилю</a></li>
                                   <li><a href="#">Литые диски</a></li>
                                   <li><a href="#">Стальные диски</a></li>
                                    -->
                                    <li><a href="<?php echo Url::toRoute('disk/index'); ?>">Каталог дисков</a></li>
                                    <li><a href="<?php echo Url::toRoute('site/recycling'); ?>">Утилизация дисков</a></li>
                                </ul></div>
                            <div class="col-xs-3">
                                <div class="fw_title">УСЛУГИ</div>
                                <ul class="fw_list">
                                    <li><a href="<?php echo Url::toRoute('site/washinginjector'); ?>">Промывка инжектора</a></li>
                                    <li><a href="<?php echo Url::toRoute('site/refuelingairconditioners'); ?>">Заправка и ремонт автокондиционеров</a></li>
                                    <li><a href="<?php echo Url::toRoute('site/mounting'); ?>">Шиномонтаж</a></li>
                                    <li><a href="<?php echo Url::toRoute('site/seasonalstorage'); ?>">Сезонное хранение</a></li>
                                    <li><a href="<?php echo Url::toRoute('site/repairofdisks'); ?>">Ремонт дисков</a></li>
                                </ul>
                            </div>
                            <div class="col-xs-3">
                                <div class="fw_title">ПОДПИСКА НА НОВОСТИ</div>
                                <ul class="fw_list">
                                    <span class="subscription">Нравится ли вам наше предложение? Не пропустите наши специальные предложения!</span>
                                    <img src="img/subscription.jpg" alt="ПОДПИСКА" />
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row item_footer">
                        <div class="col-xs-8">
                        </div>
                        <div class="col-xs-4">
                            <div class="it_soc">
                                <ul class="social_ul">
                                    <li><a href="#" class="facebook"><i class="fa fa-facebook-square fa-lg" aria-hidden="true" ></i> facebook</a></li>
                                    <li><a href="#"class="twitter"><i class="fa fa-twitter-square fa-lg" aria-hidden="true" ></i> twitter</a></li>
                                    <li><a href="#" class="google"><i class="fa fa-google-plus-square fa-lg" aria-hidden="true" ></i> google+</a></li>
                                    <li><a href="#" class="youtube"><i class="fa fa-youtube-square fa-lg" aria-hidden="true" ></i> youtube</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row e_footer">
                        <div class="col-xs-12">
                            2016 © sitengines.ru Разработка сайтов info@sitengines.ru
                        </div>
                    </div>
                </div>
            </div>
            <div class="form_back_basket">
                <div class="form_add_basket">
                    <div class="title">Товар добавлен в Корзину</div>
                    <div class="answer"><p>Оформить заказ или продолжить покупки?</p></div>
                    <div class="block_but">
                        <div id="cont_shop" class="button1 left_btn">Продолжить покупки</div>
                        <div id="check_cart" class="button1 pr_btn">Оформить заказ</div>
                    </div>
                </div>
            </div>
        </div><!-- end wrapper -->
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>