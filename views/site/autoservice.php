<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = 'Услуги автосервиса';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block_breadcrumbs">
    <?php
    echo Breadcrumbs::widget([
        'homeLink' => ['label' => 'Главная', 'url' => '/'],
        'links' => ['Услуги автосервиса'],
    ]);
    ?>
</div>
<div class="container">
    <div class="row">
        <div class="site-about">
            <h1><?= Html::encode($this->title) ?></h1>
            <ul>
                <li><a href="<?php echo Url::toRoute('site/washinginjector'); ?>">Промывка инжектора</a></li>
                <li><a href="<?php echo Url::toRoute('site/refuelingairconditioners'); ?>">Заправка и ремонт автокондиционеров</a></li>
                <li><a href="<?php echo Url::toRoute('site/repairofdisks'); ?>">Ремонт дисков</a></li>
            </ul>
        </div>
    </div>
</div>