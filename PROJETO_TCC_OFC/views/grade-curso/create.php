<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GradeCurso */

$this->title = 'Create Grade Curso';
$this->params['breadcrumbs'][] = ['label' => 'Grade Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grade-curso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
