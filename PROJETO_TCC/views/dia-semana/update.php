<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DiaSemana */

$this->title = 'Update Dia Semana: ' . ' ' . $model->id_diaSemana;
$this->params['breadcrumbs'][] = ['label' => 'Dia Semanas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_diaSemana, 'url' => ['view', 'id_diaSemana' => $model->id_diaSemana, 'id_Professor' => $model->id_Professor, 'id_Curso' => $model->id_Curso, 'id_Disciplina' => $model->id_Disciplina, 'id_Periodo' => $model->id_Periodo, 'data_inicio' => $model->data_inicio, 'data_fim' => $model->data_fim, 'horario_inicio' => $model->horario_inicio, 'horario_fim' => $model->horario_fim]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dia-semana-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
