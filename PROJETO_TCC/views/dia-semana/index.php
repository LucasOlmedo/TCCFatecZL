<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DiaSemanaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Dias da semana');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dia-semana-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '+ Novo Dia Semana'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id_diaSemana',
            'id_Professor',
            'id_Curso',
            'id_Disciplina',
            'semestre',
            'turno',
            'horario',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
