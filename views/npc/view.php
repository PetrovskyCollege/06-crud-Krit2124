<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Npc $model */

$this->title = $model->name_ru;
$this->params['breadcrumbs'][] = ['label' => 'Npcs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="npc-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name_ru',
            'name_eng',
            'image',
            'danger_level',
            'armor_class',
            'average_hits',
            [
                'attribute' => 'Кости хитов',
                'value' => function ($model) {
                    return $model->hit_dice_amount . "d" . $model->hit_dice_type . "+" . $model->hit_dice_modifier;
                },
            ],
            'skill_bonus',
            'strength',
            'dexterity',
            'constitution',
            'intelligence',
            'wisdom',
            'charisma',
            [
                'attribute' => 'id_size',
                'value' => function ($model) {
                    return $model->size->type;
                },
            ],
            [
                'attribute' => 'id_species',
                'value' => function ($model) {
                    return $model->species->type;
                },
            ],
            [
                'attribute' => 'id_subspecies',
                'value' => function ($model) {
                    return $model->subspecies->type;
                },
            ],
            [
                'attribute' => 'id_worldview',
                'value' => function ($model) {
                    return $model->worldview->type;
                },
            ],
            [
                'label' => 'Действия',
                'format' => 'raw',
                'value' => function ($model) {
                    $actions = $model->actions;
                    $output = '<ul class="listOfAnotherTableData">';
                    foreach ($actions as $action) {
                        $output .= '<li>' . Html::encode($action->description);
                        $output .= ' ' . Html::a('Просмотр', ['action/view', 'id' => $action->id], ['class' => 'btn btn-info']);
                        $output .= '</li>';
                    }
                    $output .= '</ul>';
                    $output .= Html::a('Добавить новое действие', ['action/create', 'id_npc' => $model->id], ['class' => 'btn btn-success']);
                    return $output;
                },
            ],
            [
                'attribute' => 'id_created_by',
                'value' => function ($model) {
                    return $model->createdBy->username;
                },
            ],
            'is_approved_by_admin:boolean',
            'is_named:boolean',
        ],
    ]) ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Назад', ['index'], ['class' => 'btn btn-default']) ?>
    </p>
</div>
