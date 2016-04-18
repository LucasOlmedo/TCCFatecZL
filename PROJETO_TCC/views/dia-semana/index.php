<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DiaSemanaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Dia Semanas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dia-semana-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Dia Semana'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_diaSemana',
            'id_Professor',
            'id_Curso',
            'id_Disciplina',
            'semestre',
            // 'turno',
            // 'horario',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
