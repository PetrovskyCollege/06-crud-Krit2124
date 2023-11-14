<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SpeciesType $model */

$this->title = 'Редактирование вида NPC: ' . $model->type;
$this->params['breadcrumbs'][] = ['label' => 'Species Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->type, 'url' => ['view', 'type' => $model->type]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="species-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
