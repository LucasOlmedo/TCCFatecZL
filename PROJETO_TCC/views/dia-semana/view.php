<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DiaSemana */

$this->title = $model->id_diaSemana;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dia Semanas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dia-semana-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_diaSemana' => $model->id_diaSemana, 'id_Professor' => $model->id_Professor, 'id_Curso' => $model->id_Curso, 'id_Disciplina' => $model->id_Disciplina, 'semestre' => $model->semestre, 'turno' => $model->turno], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_diaSemana' => $model->id_diaSemana, 'id_Professor' => $model->id_Professor, 'id_Curso' => $model->id_Curso, 'id_Disciplina' => $model->id_Disciplina, 'semestre' => $model->semestre, 'turno' => $model->turno], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
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
            'semestre',
            'turno',
            'horario',
        ],
    ]) ?>

</div>
