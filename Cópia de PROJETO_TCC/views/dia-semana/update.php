<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DiaSemana */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Dia Semana',
]) . ' ' . $model->id_diaSemana;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dia Semanas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_diaSemana, 'url' => ['view', 'id_diaSemana' => $model->id_diaSemana, 'id_Professor' => $model->id_Professor, 'id_Curso' => $model->id_Curso, 'id_Disciplina' => $model->id_Disciplina, 'semestre' => $model->semestre, 'turno' => $model->turno]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="dia-semana-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
