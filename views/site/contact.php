<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block_breadcrumbs">
    <?php
    echo Breadcrumbs::widget([
        'homeLink' => ['label' => 'Главная', 'url' => '/'],
        'links' => ['Контакты'],
    ]);
    ?>
</div>

<div class="container">
    <div class="row">
        <div class="col-xs-6">
            <div class="site-about">
                <h1><?= Html::encode($this->title) ?></h1>
                <p><b>Телефоны:</b></p>
                <p>+7 (906) 753-00-88</p>
                <p>+7 (906) 752-00-88</p>
                <p><b>E-mail:</b></p>
                <p>shintrayd@bk.ru</p>
                <p><b>Наш адрес:</b></p>
                <p> Москва, 2-ая Карачаровская д.1 cтр.1</p>
                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A2eeaf0b5edbe4a00f6ce75da0d78719c6189f5871580c1a4f0c2ff68642824a7&amp;width=500&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="info_pr">
                <br><br>
                <p class="center">Индивидуальный Предприниматель</p>
                <p class="center">Аксёнов Максим Александрович</p>
                <p class="center"><b>Шинный Центр «N-Tyre»</b></p>
                <p>ИП Аксёнов Максим Александрович</p>
                <p>Юридический адрес: 107241, г.Москва, 7ая Парковя ул. д.16 корп.2</p>
                <p>Фактический адрес: 109202 , г.Москва, 2ая Карачаровская д. 1С1</p>
                <p>ИНН 771872625849</p>
                <p>Р/с 40802810100000000166</p>
                <p>Кор/с 30101810845250000371</p>
                <p>БИК 044525371 в ООО МИБ «ДАЛЕНА»</p>
                <p>ЕГРНИП 316774600300807</p>
                <p>ОКВЭД 50.2 </p>
                <p>Эл.почта Shintrayd@bk.ru</p>
            </div>
        </div>
    </div>
</div>