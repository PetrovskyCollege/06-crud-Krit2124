<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SubspeciesType $model */

$this->title = 'Update Subspecies Type: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Subspecies Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subspecies-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
