<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AulaSemestral */

$this->title = $model->id_Professor;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Aula Semestrals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aula-semestral-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_Professor' => $model->id_Professor, 'id_Curso' => $model->id_Curso, 'id_Disciplina' => $model->id_Disciplina, 'semestre' => $model->semestre, 'turno' => $model->turno], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_Professor' => $model->id_Professor, 'id_Curso' => $model->id_Curso, 'id_Disciplina' => $model->id_Disciplina, 'semestre' => $model->semestre, 'turno' => $model->turno], [
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
            'id_Professor',
            'id_Curso',
            'id_Disciplina',
            'semestre',
            'turno',
            'data_inicio',
            'data_fim',
        ],
    ]) ?>

</div>
