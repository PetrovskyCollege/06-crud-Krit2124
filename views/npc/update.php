<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Npc $model */

$this->title = 'Редактирование NPC: ' . $model->name_ru;
$this->params['breadcrumbs'][] = ['label' => 'Npcs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="npc-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?= Html::a('Назад к прошлому существу', ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
</div>
