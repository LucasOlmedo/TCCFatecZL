<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CursoDisciplina */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Curso Disciplina',
]) . ' ' . $model->id_Curso;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Curso Disciplinas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_Curso, 'url' => ['view', 'id_Curso' => $model->id_Curso, 'id_Disciplina' => $model->id_Disciplina]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="curso-disciplina-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
