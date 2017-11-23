<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = 'Поиск по артикулу';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block_breadcrumbs">
    <?php
    echo Breadcrumbs::widget([
        'homeLink' => ['label' => 'Главная', 'url' => '/'],
        'links' => ['Поиск по артикулу'],
    ]);
    ?>
</div>

<div class="container">
    <div class="row">

        <h3>Нет результата поиска</h3>
    </div>
</div>