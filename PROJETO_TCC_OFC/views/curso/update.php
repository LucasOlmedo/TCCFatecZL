<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Curso */

include 'getCurso.php';
garantirAltCurso();
$this->title = Yii::t('app', 'Atualizar Curso #' . $model->id_Curso);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cursos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '#'.$model->id_Curso, 'url' => ['view', 'id' => $model->id_Curso]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Atualizar curso');
?>
<div class="curso-update">

    <h1><?= Html::encode('Atualizar Curso #'.$model->id_Curso.': '.$model->nome_curso) ?></h1>

    <?= $this->render('update_curso', [
        'model' => $model,
    ]) ?>

</div>
