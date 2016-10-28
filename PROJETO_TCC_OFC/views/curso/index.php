<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CursoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
include 'getCurso.php';
garantirIDCurso();
$this->title = Yii::t('app', 'Cursos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="curso-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-plus-sign"></span> Novo Curso'), ['create'], ['class' => 'btn btn-primary'], ['span' => 'glyphicon glyphicon-align-left']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id_Curso',
            'nome_curso',
            'abreviacao',
            'carga_horaria',
            ['class' => 'yii\grid\ActionColumn',
              'template'=> '{view} {update} {delete} {edit-disc}',
                'buttons' => [
                    'edit-disc' => function ($url) {
                        return Html::a('<span class="glyphicon glyphicon-edit"></span>',$url);
                    },
                ],
            ],
        ],
    ]); ?>


</div>
