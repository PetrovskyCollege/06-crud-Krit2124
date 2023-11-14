<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SubspeciesType $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="subspecies-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_species')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\SpeciesType::find()->all(), 'id','type')) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
