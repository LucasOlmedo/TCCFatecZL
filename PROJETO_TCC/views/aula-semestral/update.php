<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AulaSemestral */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Aula Semestral',
]) . ' ' . $model->id_Curso;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Aula Semestral'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_Curso, 'url' => ['view', 'id_Curso' => $model->id_Curso, 'id_Periodo' => $model->id_Periodo, 'id_Disciplina' => $model->id_Disciplina, 'turno' => $model->turno, 'data_inicio' => $model->data_inicio, 'data_fim' => $model->data_fim]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="aula-semestral-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
