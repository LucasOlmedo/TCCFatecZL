<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProfessorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Professors');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="professor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Professor'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_Professor',
            'nome',
            'rg',
            'categoria',
            'graduacao',
            // 'contrato',
            // 'sede',
            // 'inicio_cps',
            // 'inicio_fateczl',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
