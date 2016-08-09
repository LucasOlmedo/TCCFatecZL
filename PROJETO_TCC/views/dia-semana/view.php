<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DiaSemana */

$this->title = $model->id_diaSemana;
$this->params['breadcrumbs'][] = ['label' => 'Dia Semanas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dia-semana-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_diaSemana' => $model->id_diaSemana, 'id_Professor' => $model->id_Professor, 'id_Curso' => $model->id_Curso, 'id_Disciplina' => $model->id_Disciplina, 'id_Periodo' => $model->id_Periodo, 'data_inicio' => $model->data_inicio, 'data_fim' => $model->data_fim, 'horario_inicio' => $model->horario_inicio, 'horario_fim' => $model->horario_fim], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_diaSemana' => $model->id_diaSemana, 'id_Professor' => $model->id_Professor, 'id_Curso' => $model->id_Curso, 'id_Disciplina' => $model->id_Disciplina, 'id_Periodo' => $model->id_Periodo, 'data_inicio' => $model->data_inicio, 'data_fim' => $model->data_fim, 'horario_inicio' => $model->horario_inicio, 'horario_fim' => $model->horario_fim], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_diaSemana',
            'id_Professor',
            'id_Curso',
            'id_Disciplina',
            'id_Periodo',
            'data_inicio',
            'data_fim',
            'horario_inicio',
            'horario_fim',
        ],
    ]) ?>

</div>
