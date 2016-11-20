<?php

use app\models\Disciplina;
use yii\data\SqlDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Disciplina */

$this->title = "Disciplina #".$model->id_Disciplina;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Disciplinas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = '#'.$model->id_Disciplina;
?>
<div class="disciplina-view">

    <h1><?= Html::encode('Visualização de #'.$model->id_Disciplina.': '.$model->nome_disc) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-pencil"></span> Atualizar disciplina'), ['update', 'id' => $model->id_Disciplina], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-remove"></span> Excluir disciplina'), ['delete', 'id' => $model->id_Disciplina], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Quer realmente excluir este item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
    $count = Disciplina::find()->count();

    $dataProvider = new SqlDataProvider([
        'sql' => 'SELECT id_Disciplina, nome_disc, abreviacao, tipo FROM disciplina
                  INNER JOIN horariosexternos
                  ON disciplina.externo=horariosexternos.id_Hae
                  WHERE id_Disciplina=:idd',
        'totalCount' => $count,
        'params' => [':idd' => $model->id_Disciplina],
    ]);
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id_Disciplina',
            'nome_disc',
            'abreviacao',
            'tipo',
        ],
    ]); ?>

</div>
