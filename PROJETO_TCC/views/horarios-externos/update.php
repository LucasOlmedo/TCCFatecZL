<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HorariosExternos */

$this->title = 'Update Horarios Externos: ' . ' ' . $model->id_Hae;
$this->params['breadcrumbs'][] = ['label' => 'Horarios Externos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_Hae, 'url' => ['view', 'id' => $model->id_Hae]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="horarios-externos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
