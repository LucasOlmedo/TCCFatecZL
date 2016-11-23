<?php

use app\models\Aulasemestral;
use yii\data\SqlDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Aulasemestral */

$this->title = "Grade Semestral #".$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Grade Semestral', 'url' => ['index']];
$this->params['breadcrumbs'][] = '#'.$model->id;
?>
<script src="/js/funcConvertData.js"></script>
<div class="aulasemestral-view">

    <h1><?= Html::encode('Visualização da Grade Semestral #'.$model->id) ?></h1>

    <p>

        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-pencil"></span> Alterar Grade Semestral'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-edit"></span> Alterar Horário Semanal'), ['edit-dia', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>

        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-remove"></span> Excluir Grade Semestral'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Deseja mesmo excluir o registro? Isso excluirá a grade semanal!'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
    $count = AulaSemestral::find()->where([
        'id' => $model->id,
        'id_Curso' => $model->id_Curso,
        'id_Periodo' => $model->id_Periodo,
        'id_Disciplina' => $model->id_Disciplina,
        'id_Professor' => $model->id_Professor,
        'turno' => $model->turno,
        'data_inicio' => $model->data_inicio,
        'data_fim' => $model->data_fim
    ])->count();

    $dataProvider = new SqlDataProvider([
        'sql' => 'SELECT id, nome_curso, nome_periodo, nome_disc,
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
            [
                'attribute' => 'turno',
                'value' => function ($model) {
                    if ($model['turno'] == 0) return "Manhã";
                    if ($model['turno'] == 1) return "Tarde";
                    if ($model['turno'] == 2) return "Noite";
                    return $model;
                }
            ],
            'data_inicio',
            'data_fim',
        ],
    ]);
    ?>

    <br>
    <h1>Grade Semanal c/ horários</h1>

    <?php

    $count = \app\models\Diasemana::find()->where(['id_aulasemestral' => $model->id])->count();

    $dataProvider = new SqlDataProvider([
        'sql' => 'SELECT dia_semana, horario_inicio, horario_fim FROM diasemana
                  WHERE id_aulasemestral=:ida
                  ORDER BY dia_semana',
        'totalCount' => $count,
        'params' => [':ida' => $model->id],
    ]);
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'dia_semana',
                'format' => 'raw',
                'filter' => [
                    "0" => "Segunda",
                    "1" => "Terça",
                    "2" => "Quarta" ,
                    "3" => "Quinta" ,
                    "4" => "Sexta" ,
                    "5" => "Sábado"],
                'value' => function ($model) {
                    if ($model['dia_semana'] == 0) return "Segunda";
                    if ($model['dia_semana'] == 1) return "Terça";
                    if ($model['dia_semana'] == 2) return "Quarta";
                    if ($model['dia_semana'] == 3) return "Quinta";
                    if ($model['dia_semana'] == 4) return "Sexta";
                    if ($model['dia_semana'] == 5) return "Sábado";
                    return "";
                }
            ],
            'horario_inicio',
            'horario_fim',
        ],
    ]);

    ?>
</div>
<script>
     for(var i = 5; i < 7;i++){
        document.getElementsByTagName('td')[i].innerHTML = converterData(document.getElementsByTagName('td')[i].innerHTML);
  }

</script>
