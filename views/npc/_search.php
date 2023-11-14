<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NpcSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="npc-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name_ru') ?>

    <?php // <?= $form->field($model, 'name_eng') ?>

    <?php // echo <?= $form->field($model, 'image') ?>

    <?= $form->field($model, 'danger_level') ?>

    <?php // echo $form->field($model, 'armor_class') ?>

    <?php // echo $form->field($model, 'average_hits') ?>

    <?php // echo $form->field($model, 'hit_dice_amount') ?>

    <?php // echo $form->field($model, 'hit_dice_type') ?>

    <?php // echo $form->field($model, 'hit_dice_modifier') ?>

    <?php // echo $form->field($model, 'skill_bonus') ?>

    <?php // echo $form->field($model, 'strength') ?>

    <?php // echo $form->field($model, 'dexterity') ?>

    <?php // echo $form->field($model, 'constitution') ?>

    <?php // echo $form->field($model, 'intelligence') ?>

    <?php // echo $form->field($model, 'wisdom') ?>

    <?php // echo $form->field($model, 'charisma') ?>

    <?php // echo $form->field($model, 'id_size') ?>

    <?= $form->field($model, 'id_species')->dropDownList(
        [
            '' => 'Любой',
            \yii\helpers\ArrayHelper::map(\app\models\SpeciesType::find()->all(), 'id', 'type')
        ]
    ) ?>

    <?= $form->field($model, 'id_worldview')->dropDownList(
        [
            '' => 'Любое',
            \yii\helpers\ArrayHelper::map(\app\models\WorldviewType::find()->all(), 'id','type')
        ]
    ) ?>

    <?php // echo $form->field($model, 'id_created_by') ?>

    <?php // echo $form->field($model, 'is_approved_by_admin')->checkbox() ?>

    <?php // echo $form->field($model, 'is_named')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
