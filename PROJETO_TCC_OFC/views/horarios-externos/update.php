<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HorariosExternos */

$this->title = 'Atualizar Horário Externo ' . ' #' . $model->id_Hae;
$this->params['breadcrumbs'][] = ['label' => 'Horários', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '#'.$model->id_Hae, 'url' => ['view', 'id' => $model->id_Hae]];
$this->params['breadcrumbs'][] = 'Atualizar Horário Externo';
?>
<div class="horarios-externos-update">

    <h1><?= Html::encode($this->title.': '.$model->tipo) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
