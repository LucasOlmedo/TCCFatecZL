<?php

use yii\data\SqlDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Professor */

$this->title = "Visualização de #". $model->id_Professor;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Professores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="professor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-pencil"></span> Alterar Professor'), ['update', 'id' => $model->id_Professor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-remove"></span> Excluir Professor'), ['delete', 'id' => $model->id_Professor], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Deseja mesmo excluir o item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_Professor',
            'nome',
            'rg',
            'categoria',
            'graduacao',
            'contrato',
            'sede',
            'inicio_cps',
            'inicio_fateczl',
        ],
    ]) ?>

    <h1>Situações desse professor</h1>

    <?php

    $count = \app\models\SituacaoProfessor::find()->where(['id_Professor' => $model->id_Professor])->count();

    $dataProvider = new SqlDataProvider([
        'sql' => 'SELECT nome, data_sit FROM situacao_professor
                  INNER JOIN situacao
                  ON situacao_professor.id_Situacao = situacao.id_Situacao
                  WHERE situacao_professor.id_Professor=:idp',
        'totalCount' => $count,
        'params' => [':idp' => $model->id_Professor],
    ]);
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'nome',
            'data_sit',
        ],
    ]);
    ?>

</div>
