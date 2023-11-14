<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SubspeciesType $model */

$this->title = 'Create Subspecies Type';
$this->params['breadcrumbs'][] = ['label' => 'Subspecies Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subspecies-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
