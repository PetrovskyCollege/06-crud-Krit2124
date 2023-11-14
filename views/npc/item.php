<?php
use yii\helpers\Html;
use yii\helpers\Url;
use \yii\helpers\ArrayHelper;

/* @var $model app\models\Npc */
?>

<div class="npc-item">
    <div class="npc-item-data">
        <div class="npc-item-imgdata"><?= Html::img($model->image, ['alt' => 'NPC Image']) ?></div>
        <span class="vertical-line"></span>
        <div class="npc-item-textdata">
            <h2><?= Html::encode($model->name_ru) ?></h2>
            <p><?= Html::encode($model->species->type) ?></p>
            <p><?= Html::encode($model->worldview->type) ?></p>
        </div>
        <span class="vertical-line"></span>
        <p class="npc-item-dangerLevel"><?= Html::encode($model->danger_level) ?></h2>
    </div>
    <?= Html::a('Подробнее', ['view', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
</div>