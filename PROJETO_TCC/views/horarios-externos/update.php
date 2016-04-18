<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HorariosExternos */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Horarios Externos',
]) . ' ' . $model->id_Hae;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Horarios Externos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_Hae, 'url' => ['view', 'id_Hae' => $model->id_Hae, 'id_Disciplina' => $model->id_Disciplina]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="horarios-externos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
