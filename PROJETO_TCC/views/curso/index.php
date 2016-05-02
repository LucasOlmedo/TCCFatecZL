<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CursoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cursos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="curso-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '+ Novo Curso'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id_Curso',
            'nome',
            'abreviacao',
            'carga_horaria',
            ['class' => 'yii\grid\ActionColumn',
//              'template'=>'{view}{create}{trash}',
//                'buttons'=>[
//                    'view' => function ($url, $model) {
//                        return Html::a('<span class="glyphicon glyphicon-view"></span>', $url, [
//                            'title' => Yii::t('yii', 'view'),
//                        ]);
//                    },
//                    'search' => function ($url, $model) {
//                        return Html::a('<span class="glyphicon glyphicon-search"></span>', $url, [
//                            'title' => Yii::t('yii', 'Create'),
//                        ]);
//                    },
//                    'trash' => function ($url, $model) {
//                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
//                            'title' => Yii::t('yii', 'Create'),
//                        ]);
//                    }
//                ]
            ],
        ],
    ]); ?>

</div>
