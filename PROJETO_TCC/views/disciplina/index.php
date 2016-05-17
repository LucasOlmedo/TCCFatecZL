<?php

use app\models\Disciplina;
use yii\data\SqlDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DisciplinaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Disciplinas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disciplina-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-plus-sign"></span> Nova Disciplina'), ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?=
//    $count = Disciplina::find()->where(['id_Disciplina' => $model->id_Disciplina])->count();
//
//    $dataProvider = new SqlDataProvider([
//        'sql' => 'SELECT id_Disciplina, nome, abreviacao, tipo FROM disciplina
//                  INNER JOIN horariosexternos
//                  ON disciplina.`externo` = horariosexternos.`id_Hae`;',
//        'totalCount' => $count,
//    ]);

    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id_Disciplina',
            'nome',
            'abreviacao',
            'externo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
