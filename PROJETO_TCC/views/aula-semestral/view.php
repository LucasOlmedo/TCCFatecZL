<?php

use app\models\AulaSemestral;
use app\models\GradeCurso;
use yii\data\SqlDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AulaSemestral */

$this->title = "Aula semestral do curso #".$model->id_Curso;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Aula Semestral'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aula-semestral-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-pencil"></span> Atualizar aula semestral'), ['update', 'id_Curso' => $model->id_Curso, 'id_Periodo' => $model->id_Periodo, 'id_Disciplina' => $model->id_Disciplina, 'turno' => $model->turno, 'data_inicio' => $model->data_inicio, 'data_fim' => $model->data_fim], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-remove"></span> Excluir aula semestral'), ['delete', 'id_Curso' => $model->id_Curso, 'id_Periodo' => $model->id_Periodo, 'id_Disciplina' => $model->id_Disciplina, 'turno' => $model->turno, 'data_inicio' => $model->data_inicio, 'data_fim' => $model->data_fim], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php

    $count = AulaSemestral::find()->where([
        'id_Curso' => $model->id_Curso,
        'id_Periodo' => $model->id_Periodo,
        'id_Disciplina' => $model->id_Disciplina,
        'id_Professor' => $model->id_Professor,
        'turno' => $model->turno,
        'data_inicio' => $model->data_inicio,
        'data_fim' => $model->data_fim
    ])->count();

    $dataProvider = new SqlDataProvider([
        'sql' => 'SELECT nome_curso, nome_periodo, nome_disc,
                  professor.`nome`, turno, data_inicio, data_fim FROM aulasemestral
                  INNER JOIN curso
                  ON aulasemestral.`id_Curso`=curso.`id_Curso`
                  INNER JOIN periodo
                  ON aulasemestral.`id_Periodo` = periodo.`id_Periodo`
                  INNER JOIN disciplina
                  ON aulasemestral.`id_Disciplina` = disciplina.`id_Disciplina`
                  INNER JOIN professor
                  ON aulasemestral.`id_Professor` = professor.`id_Professor`
                  WHERE aulasemestral.id_Curso=:cur AND
                  aulasemestral.id_Periodo=:per AND
                  aulasemestral.id_Disciplina=:dis AND
                  aulasemestral.id_Professor=:pro AND
                  aulasemestral.turno=:tur AND
                  aulasemestral.data_inicio=:dti AND
                  aulasemestral.data_fim=:dtf',
        'totalCount' => $count,
        'params' => [
            ':cur' => $model->id_Curso,
            ':per' => $model->id_Periodo,
            ':dis' => $model->id_Disciplina,
            ':pro' => $model->id_Professor,
            ':tur' => $model->turno,
            ':dti' => $model->data_inicio,
            ':dtf' => $model->data_fim
        ],
    ]);

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'nome_curso' => ['label' => 'Curso', 'value' => 'nome_curso'],
            'nome_periodo' => ['label' => 'Período', 'value' => 'nome_periodo'],
            'nome_disc' => ['label' => 'Disciplina', 'value' => 'nome_disc'],
            'nome' => ['label' => 'Professor', 'value' => 'nome'],
            'turno',
            'data_inicio',
            'data_fim',
        ],
    ]);
 ?>

</div>
