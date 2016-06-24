<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HorariosExternos */

$this->title = Yii::t('app', 'Atualizar {modelClass}: ', [
    'modelClass' => 'Horario Externo',
]) . ' ' . $model->id_Hae;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Horários Externos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_Hae, 'url' => ['view', 'id' => $model->id_Hae]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="horarios-externos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
