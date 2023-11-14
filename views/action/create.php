<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Action $model */

$this->title = 'Создать новое действие';
$this->params['breadcrumbs'][] = ['label' => 'Actions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="action-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
