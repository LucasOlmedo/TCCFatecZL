<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\HorariosExternos */

$this->title = "Visualização de #".$model->id_Hae;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Horários Externos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horarios-externos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-pencil"></span> Alterar Horario Externo'), ['update', 'id' => $model->id_Hae], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-remove"></span> Remover Horario Externo'), ['delete', 'id' => $model->id_Hae], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_Hae',
            'tipo',
        ],
    ]) ?>

</div>
