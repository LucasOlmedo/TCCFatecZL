<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AulaSemestral */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Aula Semestral',
]) . ' ' . $model->id_Professor;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Aula Semestrals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_Professor, 'url' => ['view', 'id_Professor' => $model->id_Professor, 'id_Curso' => $model->id_Curso, 'id_Disciplina' => $model->id_Disciplina, 'semestre' => $model->semestre, 'turno' => $model->turno]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="aula-semestral-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
