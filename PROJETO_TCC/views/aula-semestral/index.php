<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AulaSemestralSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Aula Semestral');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aula-semestral-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-plus-sign"></span> Nova Aula Semestral'), ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_Professor',
            'id_Curso',
            'id_Disciplina',
            'semestre',
            'turno',
            // 'data_inicio',
            // 'data_fim',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
