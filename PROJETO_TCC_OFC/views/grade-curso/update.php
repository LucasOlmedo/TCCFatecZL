<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GradeCurso */

$this->title = 'Update Grade Curso: ' . ' ' . $model->id_Curso;
$this->params['breadcrumbs'][] = ['label' => 'Grade Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_Curso, 'url' => ['view', 'id_Curso' => $model->id_Curso, 'id_Periodo' => $model->id_Periodo, 'id_Disciplina' => $model->id_Disciplina]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="grade-curso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
