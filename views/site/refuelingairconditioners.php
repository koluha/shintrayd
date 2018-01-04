<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = 'Ремонт и заправка кондиционеров';
$meta_description = $this->title;
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
<div class="block_breadcrumbs">
    <?php
    echo Breadcrumbs::widget([
        'homeLink' => ['label' => 'Главная', 'url' => '/'],
        'links' => ['Ремонт и заправка кондиционеров'],
    ]);
    ?>
</div>
<div class="container">
    <div class="row">
        <div class="site-about">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>В нашей компании "SHINTRAYD" мы предлагаем следующие услуги по обслуживанию автокондиционераов.</p>
            <p>1) Замена и ремонт радиаторов охлаждения и кондиционирования.&nbsp;<br />2) Изготовление шлангов.<br />3) Антибактериальная обработка салона.<br />4) Диагностика системы автокондиционера.<br />5) Замена муфты автокондиционера.<br />6) Заправка автокондиционера фреоном &nbsp;#134а. #12<br />7)&nbsp;Ремонт трубок автокондиционера.<br />8) Аргонодуговая сварка</p>
            <p style="font-size: 24px;"><span style="color: #ff0000;"><b><i>SHINTRAYD</i></b>&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<b>АВТОКОНДИЦИОНЕРЫ ЗАПРАВКА И РЕМОНТ </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
            <p style="font-size: 24px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<b>Услуги на обслуживание автокондиционкра&nbsp;</b></p>
            <table border="1" cellspacing="0" cellpadding="0" align="left" style="width: 1105px; height: 529px;">
                <tbody>
                    <tr>
                        <td width="636" valign="top">
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>&nbsp;наименование</b></p>
                        </td>
                        <td width="96" valign="top">
                            <p><b>&nbsp;</b></p>
                            <p><b>&nbsp;ЦЕНЫ</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="636" valign="top">
                            <p>Заправка автокондиционера фреоном R134а до 1кг.</p>
                        </td>
                        <td width="96" valign="top">
                            <p><b>&nbsp;&nbsp; 1500</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="636" valign="top">
                            <p>Заправка автокондиционера фреоном R12 до 1кг.</p>
                        </td>
                        <td width="96" valign="top">
                            <p><b>&nbsp;&nbsp;&nbsp; 3000</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="636" valign="top">
                            <p>Диагностика автокндиционера (проверка на утечку и проверка работоспособности системы, кроме проблем с электрикой ).</p>
                        </td>
                        <td width="96" valign="top">
                            <p><b>&nbsp;&nbsp;&nbsp; 500</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="636" valign="top">
                            <p>Диагностика автокондиционера под давлением ультрафиолетового масла ( проверка на утечку и проверка работоспособности системы, кроме проблем с электрикой ).</p>
                        </td>
                        <td width="96" valign="top">
                            <p><b>&nbsp;&nbsp;&nbsp; 850</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="636" valign="top">
                            <p>Диагностика двухконтурного автокондиционера (проверка на утечку и проверка работоспособности системы, кроме проблем с электрикой ).</p>
                        </td>
                        <td width="96" valign="top">
                            <p><b>&nbsp;&nbsp;&nbsp; 800</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="636" valign="top">
                            <p>Диагностика двухконтурного автокондиционера под давлением ультрафиолетового масла (проверка на утечку и проверка работоспособности системы, кроме проблем с электрикой)&nbsp;</p>
                        </td>
                        <td width="96" valign="top">
                            <p><b>&nbsp;&nbsp;&nbsp; 1100</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="636" valign="top">
                            <p>Если при оказании вышеперечисленных услуг затрачено на 1 автомобиль более 1кг. Газа, каждые последующие 100г.</p>
                        </td>
                        <td width="96" valign="top">
                            <p><b>&nbsp;&nbsp;&nbsp; 100</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="636" valign="top">
                            <p>Добавление масла в систему автокондиционера после замены таких агрегатов как: компрессор, конденсатор, аккумулятор, ресивер, испаритель.</p>
                        </td>
                        <td width="96" valign="top">
                            <p><b>&nbsp;&nbsp;&nbsp; 300</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="636" valign="top">
                            <p>Изготовление шланга высокого давления ( до 50см. )</p>
                        </td>
                        <td width="96" valign="top">
                            <p><b>&nbsp;&nbsp;&nbsp; 1500</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="636" valign="top">
                            <p>Изготовление шланга высокого давления ( от 50см. до 1м. )</p>
                        </td>
                        <td width="96" valign="top">
                            <p><b>&nbsp;&nbsp;&nbsp; 1700</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="636" valign="top">
                            <p>Очистка системы кондиционера от деструкций испорченного компрессора</p>
                            <p>&nbsp;</p>
                        </td>
                        <td width="96" valign="top">
                            <p><b>от 5000</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="636" valign="top">
                            <p>Антибактериальная обработка салона и испарителя легковых автомобилей&nbsp;&nbsp; &nbsp;</p>
                        </td>
                        <td width="96" valign="top">
                            <p><b>&nbsp;&nbsp;&nbsp;&nbsp; 1500</b></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>
                <?= Html::img('@web/img/services/kondic/4.jpg', ['alt' => 'Заправка кондиционеров', 'width' => 135, 'height' => 202]) ?>&nbsp; &nbsp; &nbsp; &nbsp;
                <?= Html::img('@web/img/services/kondic/5.jpg', ['alt' => 'Заправка кондиционеров', 'width' => 200, 'height' => 200]) ?>&nbsp; &nbsp; &nbsp; &nbsp;
                <?= Html::img('@web/img/services/kondic/6.jpg', ['alt' => 'Заправка кондиционеров', 'width' => 200, 'height' => 200]) ?>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                <?= Html::img('@web/img/services/kondic/7.jpg', ['alt' => 'Заправка кондиционеров', 'width' => 200, 'height' => 200]) ?>
            </p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p><span>АНТИБАКТЕРИАЛЬНАЯ ОБРАБОТКА СИСТЕМЫ АВТОКОДИЦИОНЕРА.</span><br /><span>Дезинфекция автокондиционера &ndash; это не простая процедура, в процессе, которой происходит не только дезинфекция салона автомобиля , но и всех воздушных патрубков с помощью специализированного оборудования . К тому же, во время дезинфекции происходит очистка испарителя автокондиционера от грязи, плесени и само собой бактерий.<br /><br /><span>Почему же прохладный освежающий воздух кондиционера через несколько лет превращается в ужасный неприятный запах ?<br /></span></span><br />
                <?= Html::img('@web/img/services/kondic/b999c5d7eb13d37cb8c32675953def6535d7d2c9.jpg', ['alt' => 'Заправка кондиционеров', 'width' => 542, 'height' => 260, 'style' => "vertical-align: middle; display: block; margin-left: auto; margin-right: auto;"]) ?>
            </p>
            <p><span>Все просто , испаритель &ndash; это небольшой радиатор, который при работе кондиционера охлаждается до минусовых показателей , снижая температуру проходящего под большим давлением через него воздуха, а с улицы через решетку радиатора на испаритель попадает грязь, пыль и множество загрязняющих веществ различной органики. В процессе работы автокондиционера&nbsp;&nbsp;испаритель покрывается инеем, как только кондиционер отключается&nbsp;&nbsp;на испарителе образуется конденсат и разжиженная на микрочастицы в испарителе грязь, пыль, находящиеся в нем бактерии начинают разносить неприятный запах. Этот неприятный запах начинает впитываться в обшивку автомобиля, в декоративные подушечки, которые лежат на задних сидениях. И вам начинает казаться, что этот запах по всюду и от него не избавиться даже очень дорогими средствами защиты салона (полироль, воздуха освежитель) и др. Но это как оказалось пол беды . Прежде всего это подрыв вашего собственного и драгоценного ЗДОРОВЬЯ .&nbsp;&nbsp;&nbsp;Очень страдают люди подверженные аллергическим реакциям, симптомы проявляются разные: сильный сухой кашель, першение в горле, слезоточивость глаз и&nbsp;&nbsp;т.д.</span><span class="im"><br />Второй источник неприятного запаха - это дым от сигарет в салоне автомобиля.</span><br />
                  <?= Html::img('@web/img/services/kondic/parlament-velikobritanii-zapretil-kurenie-v-avtomobile-pri-detyah-0.png', ['alt' => 'Заправка кондиционеров', 'width' => 400, 'height' => 266, 'style' => "display: block; margin: 5px auto; vertical-align: middle;"]) ?>
                 </p>
            <p></p>
            <p><span>Сигаретный смолистый и едкий дым проникает в систему вентиляции и оседает на ее элементах, поэтому через некоторое время, при включении кондиционера или климат контроля, вы будете чувствовать неприятный запах, словно по всей машине раскиданы недокуренные бычки и ощущение переполненной пепельницы, вместо бодрящей свежести холодного и приятного воздуха.</span><br /><span>Поэтому полную дезинфекцию автокондиционера следует проводить не менее одного&nbsp;&nbsp;раза в два года . Не пытайтесь применять дешевые средства по очистке системы автокондиционера, поскольку вы не сможете достичь нужного результата . Доверьте эту процедуру профессионалам и вы убедитесь в качестве выполненной работы . В сервисе Shintrayd систему обеззаразят и обработают специальными средствами, которые будут препятствовать распространению и развитию бактерий, грибков и даже плесени.</span></p>
            <p><span>
                    <?= Html::img('@web/img/services/kondic/83f7561af981043a17aa6781c53fd346.jpeg', ['alt' => 'Заправка кондиционеров', 'width' => 400, 'height' => 266, 'style' => "display: block; margin-left: auto; margin-right: auto;"]) ?>
                </span></p>
            <div><span><span>После такой процедуры очистки салона вашего автомобиля , работа системы фильтрации заметно улучшится так же как и ваше собственное самочувствие.&nbsp;</span></span></div>
            <p><span>&nbsp;</span></p>
            <p></p>

        </div>
    </div>
</div>