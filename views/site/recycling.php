<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = 'Утилизация шин и дисков';
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
        'links' => ['Утилизация шин и дисков'],
    ]);
    ?>
</div>
<div class="container">
    <div class="row">
        <div class="site-about">
            <h1><?= Html::encode($this->title) ?></h1>

            <p><b>&nbsp;</b></p>
            <p><b>К сожалению самой большой проблемой для автолюбителей является утилизация старых или порванных покрышек. Конечно для многих это может и не является проблемой и эти люди без всякого стыда и без угрызений совести могут выкинуть и на обочину проезжей части</b> <b>&nbsp;или положить возле мусорных контейнеров что в принципе&nbsp; запрещено .</b></p>
            <p><b>
                    <?= Html::img('@web/img/services/ytilizacia/util3.jpg', ['alt' => 'Утилизация шин и дисков', 'width' => 425, 'height' => 282]) ?>
                </b></p>
            <p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b></p>
            <p><b>&nbsp;Покрышки являются одним из опасных отходов загрязняющие окружающую нашу с вами среду. &nbsp;</b></p>
            <p><b>Никто из нас конечно не хочет в будущем увидеть такое</b></p>
            <p><b>
                    <?= Html::img('@web/img/services/ytilizacia/util2.jpg', ['alt' => 'Утилизация шин и дисков', 'width' => 891, 'height' => 554]) ?>
                </b></p>
            <p><b>&nbsp;</b></p>
            <p><b>В нашей компании </b><b>SHINTRAYD</b><b> </b><b>мы создали пункт по приёму отработанных и не пригодных покрышек. Мы хотим добиться того, чтобы человеку было удобнее сдать старые шины в переработку, чем просто выкинуть их на обочину. Ведь сдать легче всего в пунктах автосервиса или шиномонтажа , где каждый сезон все обычно меняют покрышки. &nbsp;</b></p>
            <p><b>Давайте отнесёмся с пониманием к нашей среде обитания и сделаем наш мир на сколько это возможно лучше и чище.</b></p>
            <p><b>
                    <?= Html::img('@web/img/services/ytilizacia/util-priroda.jpg', ['alt' => 'Утилизация шин и дисков', 'width' => 640, 'height' => 480]) ?>
                </b></p>
            <p><b>&nbsp;</b></p>
            <p style="font-size: 18px;"><b>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style="color: #339966;">&nbsp; &nbsp;</span></b><span style="color: #339966;"><b style="line-height: 1.5;"><i>&nbsp;Берегите природу !</i></b></span></p>
            <p><span style="color: #ff0000;"><b><i>SHINTRAYD</i></b></span><b><i></i></b></p>
            <p><b><i>&nbsp;</i></b></p>
            <p style="font-size: 24px;"><b><i>&nbsp;</i></b></p>
            <p style="font-size: 24px;"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Утилизация шин и дисков</b></p>
            <p style="font-size: 24px;"><b style="line-height: 1.5;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Прайс по утилизации</b></p>
            <p><b>&nbsp;</b></p>
            <p>&nbsp;</p>
            <table border="1" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <td width="732" valign="top">
                            <p><b>&nbsp;</b></p>
                            <p><b>Шины размером от&nbsp;&nbsp; &nbsp;</b><b>R</b><b>13&nbsp;&nbsp; до &nbsp;&nbsp;</b><b>R</b><b>18&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; легковые</b></p>
                        </td>
                        <td width="156" valign="top">
                            <p><b>&nbsp;</b></p>
                            <p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</b><b>100</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="732" valign="top">
                            <p><b>&nbsp;</b></p>
                            <p><b>Шины размером от&nbsp;&nbsp; &nbsp;</b><b>R</b><b>19&nbsp;&nbsp;&nbsp; до&nbsp;&nbsp; </b><b>R</b><b>24&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; легковые</b></p>
                        </td>
                        <td width="156" valign="top">
                            <p><b>&nbsp;</b></p>
                            <p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 150</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="732" valign="top">
                            <p><b>&nbsp;</b></p>
                            <p><b>Шины размером от &nbsp;&nbsp;</b><b>R</b><b>15&nbsp;&nbsp;&nbsp; до&nbsp;&nbsp;&nbsp; </b><b>R</b><b>18&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; внедорожные</b></p>
                        </td>
                        <td width="156" valign="top">
                            <p><b>&nbsp;</b></p>
                            <p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 150</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="732" valign="top">
                            <p><b>&nbsp;</b></p>
                            <p><b>Шины размером от&nbsp;&nbsp; </b><b>R</b><b>19&nbsp;&nbsp;&nbsp; до&nbsp; &nbsp;&nbsp;</b><b>R</b><b>22&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; внедорожные</b></p>
                        </td>
                        <td width="156" valign="top">
                            <p><b>&nbsp;</b></p>
                            <p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 200</b></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="732" valign="top">
                            <p><b>&nbsp;</b></p>
                            <p><b>Диски штампованные и легкосплавные</b></p>
                        </td>
                        <td width="156" valign="top">
                            <p><b>&nbsp;</b></p>
                            <p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 100</b></p>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>