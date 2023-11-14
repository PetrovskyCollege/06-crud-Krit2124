<?php

use app\models\Npc;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var app\models\NpcSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Бестиарий';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="npc-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать NPC', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => 'item',
        'summary' => '',
        'itemOptions' => [
            'tag' => false,
        ],
    ]); ?>

</div>