<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Professor */

$this->title = Yii::t('app', 'Atualizar {modelClass}: ', [
    'modelClass' => 'Professor',
]) . ' #' . $model->id_Professor;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Professors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '#'.$model->id_Professor, 'url' => ['view', 'id' => $model->id_Professor]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="professor-update">

    <h1><?= Html::encode('Atualizar professor #'.$model->id_Professor) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
