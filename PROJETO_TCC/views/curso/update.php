<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Curso */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Curso',
]) . ' ' . $model->id_Curso;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cursos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_Curso, 'url' => ['view', 'id' => $model->id_Curso]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="curso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
