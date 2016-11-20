<?php

use yii\data\SqlDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_Curso',
            'id_Periodo',
            'id_Disciplina',
            'id_Professor',
            'turno',
            'data_inicio',
            'data_fim',
        ],
    ]) ?>

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
    for(var i = 6; i < 8;i++){
        document.getElementsByTagName('td')[i].innerHTML = converterData(document.getElementsByTagName('td')[i].innerHTML);
    }

</script>
