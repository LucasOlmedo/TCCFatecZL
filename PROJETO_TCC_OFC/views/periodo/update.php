<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Periodo */

$this->title = 'Atualizar Período: ' . ' ' . $model->id_Periodo;
$this->params['breadcrumbs'][] = ['label' => 'Períodos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_Periodo, 'url' => ['view', 'id' => $model->id_Periodo]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="periodo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
