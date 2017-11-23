<?php
/* Используется */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = 'Шиномонтаж';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="block_breadcrumbs">
    <?php
    echo Breadcrumbs::widget([
        'homeLink' => ['label' => 'Главная', 'url' => '/'],
        'links' => ['Шиномонтаж'],
    ]);
    ?>
</div>
<div class="container">
    <div class="row">
        <div class="site-about">
            <h1><?= Html::encode($this->title) ?></h1>
            <p>Наши высококвалифицированные специалисты-шиномонтажники, работающие на качественном немецком и итальянском оборудовании ( SIKAM и HOFMAN), что гораздо повышает качество оказываемых услуг , профессионально выполняют все шиномонтажные работы, а также работы по ремонту колес.</p>
            <p></p>
            <p><?= Html::img('@web/img/services/shinomontazh/1.jpg', ['alt' => 'Шиномонтаж', 'width' => 300, 'height' => 300]) ?>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                <?= Html::img('@web/img/services/shinomontazh/2.jpg', ['alt' => 'Шиномонтаж', 'width' => 300, 'height' => 300]) ?>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <?= Html::img('@web/img/services/shinomontazh/3.jpg', ['alt' => 'Шиномонтаж', 'width' => 300, 'height' => 300]) ?>
            </p>
            <table border="1" cellspacing="0" cellpadding="0" align="left" style="width: 1018px;">
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'><b>Внедорожников, SUV и микроавтобусов</b></td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>R14С</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>R15-R16С</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>R15-16</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>R17</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>R18</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>R19</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>R20</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>R22</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Снятие и установка 1-го колеса</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200-250</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>150</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>150</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>250</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>300</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Мойка  1 колеса</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>50</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>100</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>50</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>50</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>50</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>100</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>100</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>100</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Демонтаж 1-го колеса</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>150</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>250</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>300</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>300</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Монтаж 1-го колеса</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>150</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>250</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>300</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>300</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Балансировка 1 колеса</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>150-200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>250</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>250</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>300</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>350</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>400</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>400</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Демонтаж шины с усиленным бортом (RCS, RUNFLAT и др.)</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>---</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>---</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>300</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>400</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>400</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>500</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>600</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>600</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Монтаж шины с усиленным бортом (RCS, RUNFLAT и др.)</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>---</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>---</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>300</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>400</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>400</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>500</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>600</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>600</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Демонтаж шины  (профиль ниже 50%)</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>---</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>---</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>250</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>300</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>350</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>400</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>550</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Монтаж шины (профиль ниже 50%)</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>---</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>---</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>250</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>300</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>350</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>400</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>550</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Комплекс 1 (снятия\установка+балансировка) 1 колесо</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>300-350</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>400</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>400</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>450</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>550</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>600</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>650</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>700</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Комплекс 2 (снятие/установка, монтаж/демонтаж, балансировка) 1 колесо</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>500-550</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>800</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>700</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>800</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>900</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>1000</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>1250</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>1400</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Комплекс 3 (снятие/установка, монтаж/демонтаж, балансировка) 4 колеса</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>2200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>2600</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>2500</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>2700</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>2900</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>3400</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>4000</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>4900</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Комплекс 4 (профиль ниже 50%) 4 колеса</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>----</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>----</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>2700</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>2900</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>3500</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>4000</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>4600</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>5700</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Комплекс 5 с усиленным бортом (RCS, RUNFLAT и др.) 4 колеса</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'> </td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'> </td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>3100</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>3500</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>3900</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>4400</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>5200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>6100</td>
                </tr>
            </table>
   
            <table border="1" class="tb_2" cellspacing="0" cellpadding="0" align="left" style="width: 1018px;">
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>№</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'><b>Легковых автомобилей </b></td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>R13-14</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>R15</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>R16</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>R17</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>R18</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>R19</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>R20</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>R22</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>1</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Снятие и установка 1-го колеса</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>100</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>100</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>100</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>150</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>150</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>25</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>2</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>мойка 1 колеса</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>50</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>50</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>50</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>50</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>50</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>50</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>50</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>50</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>3</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Демонтаж 1-го колеса</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>100</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>125</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>150</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>150</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>300</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>350</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>4</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Монтаж 1-го колеса</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>100</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>125</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>150</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>150</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>300</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>350</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>5</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Балансировка 1 колеса</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>100</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>125</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>150</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>250</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>300</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>350</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>400</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>6</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Демонтаж шины с усиленным бортом (RCS, RUNFLAT и др.)</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'> </td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'> </td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>250</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>300</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>350</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>400</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>600</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>7</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Монтаж шины с усиленным бортом (RCS, RUNFLAT и др.)</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'> </td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'> </td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>250</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>300</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>350</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>400</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>600</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>8</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Демонтаж шины  (профиль ниже 50%)</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'> </td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'> </td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>150</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>300</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>400</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>500</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>600</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>9</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Монтаж шины (профиль ниже 50%)</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'> </td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'> </td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>150</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>300</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>400</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>500</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>600</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>10</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Комплекс 1(снятие\установка+балансировка) 1 колесо</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>250</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>300</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>350</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>400</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>450</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>500</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>650</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>11</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Комплекс 2 (снятие/установка, монтаж/демонтаж, балансировка) 1 колесо</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>400</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>500</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>550</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>650</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>800</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>850</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>1100</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>1350</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>12</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Комплекс 3 ( профиль ниже 50%) (снятие/установка, монтаж/демонтаж, балансировка) 1 колесо</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'> </td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'> </td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>650</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>750</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>850</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>900</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>1200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>1850</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>13</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Комплекс 4 (снятие/установка, монтаж/демонтаж, балансировка) 4 колеса </td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>1500</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>1800</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>2000</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>2300</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>2500</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>2800</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>3500</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>4400</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>14</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Комплекс 5 с усиленным бортом (RCS, RUNFLAT и др.) 4 колеса</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'> </td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'> </td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>2600</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>3000</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>3400</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>3800</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>4400</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>5000</td>
                </tr>
                <tr>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>15</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>Комплекс 6 (профиль ниже 50%) 4 колеса</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'> </td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'> </td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>2200</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>2600</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>2900</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>3300</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>3600</td>
                    <td style='border-bottom:solid 1px #000000; border-right:solid 1px #000000;'>5000</td>
                </tr>
            </table>



        </div>
    </div>
</div>