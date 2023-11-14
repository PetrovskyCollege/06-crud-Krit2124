<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SizeType $model */

$this->title = 'Create Size Type';
$this->params['breadcrumbs'][] = ['label' => 'Size Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="size-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
