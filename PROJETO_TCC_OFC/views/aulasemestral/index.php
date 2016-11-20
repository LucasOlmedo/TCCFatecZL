<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AulasemestralSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Grade Semestral';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aulasemestral-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus-sign"></span> Nova Grade Semestral', ['create'], ['class' => 'btn btn-primary'], ['span' => 'glyphicon glyphicon-align-left']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'id_Curso',
            'id_Periodo',
            'id_Disciplina',
            'id_Professor',
            //'turno',
            //'data_inicio',
            //'data_fim',

            ['class' => 'yii\grid\ActionColumn',
                'template'=> '{view} {update} {delete} {edit-dia}',
                'buttons' => [
                    'edit-dia' => function ($url) {
                        return Html::a('<span class="glyphicon glyphicon-edit"></span>',$url);
                    },
                ],
            ],
        ],
    ]); ?>

</div>
