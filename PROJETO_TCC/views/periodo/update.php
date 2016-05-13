<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Periodo */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Periodo',
]) . ' ' . $model->id_Periodo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Periodos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_Periodo, 'url' => ['view', 'id' => $model->id_Periodo]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="periodo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
