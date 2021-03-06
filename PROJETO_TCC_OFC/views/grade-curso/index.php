<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GradeCursoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Grade Cursos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grade-curso-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Grade Curso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_Curso',
            'id_Periodo',
            'id_Disciplina',
            'qtde_aulas',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
