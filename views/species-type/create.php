<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SpeciesType $model */

$this->title = 'Создание вида NPC';
$this->params['breadcrumbs'][] = ['label' => 'Species Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="species-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
