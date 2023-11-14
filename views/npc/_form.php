<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Npc $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="npc-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_eng')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'danger_level')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'armor_class')->textInput() ?>

    <?= $form->field($model, 'average_hits')->textInput() ?>

    <?= $form->field($model, 'hit_dice_amount')->textInput() ?>

    <?= $form->field($model, 'hit_dice_type')->dropDownList(
    [
        4 => "4",
        6 => "6",
        8 => "8",
        10 => "10",
        12 => "12",
        20 => "20",
    ])?>

    <?= $form->field($model, 'hit_dice_modifier')->textInput() ?>

    <?= $form->field($model, 'skill_bonus')->textInput() ?>

    <?= $form->field($model, 'strength')->textInput() ?>

    <?= $form->field($model, 'dexterity')->textInput() ?>

    <?= $form->field($model, 'constitution')->textInput() ?>

    <?= $form->field($model, 'intelligence')->textInput() ?>

    <?= $form->field($model, 'wisdom')->textInput() ?>

    <?= $form->field($model, 'charisma')->textInput() ?>

    <?= $form->field($model, 'id_size')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\SizeType::find()->all(), 'id','type')) ?>

    <?= $form->field($model, 'id_species')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\SpeciesType::find()->all(), 'id','type')) ?>

    <?= $form->field($model, 'id_subspecies')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\SubspeciesType::find()->all(), 'id','type')) ?>

    <?= $form->field($model, 'id_worldview')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\WorldviewType::find()->all(), 'id','type')) ?>

    <?= $form->field($model, 'id_created_by')->textInput() ?>

    <?= $form->field($model, 'is_approved_by_admin')->checkbox() ?>

    <?= $form->field($model, 'is_named')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Назад к списку существ', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
