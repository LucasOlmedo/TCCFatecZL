<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Aulasemestral */

$this->title = 'Atualizar Grade Semestral: ' . ' #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Grade Semestral', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '#'.$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar grade';
?>
<div class="aulasemestral-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('update_grade', [
        'model' => $model,
    ]) ?>

</div>
