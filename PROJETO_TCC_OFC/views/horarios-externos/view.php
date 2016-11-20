<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\HorariosExternos */

$this->title =  "Horário Externo #" . $model->id_Hae;
$this->params['breadcrumbs'][] = ['label' => 'Horários', 'url' => ['index']];
$this->params['breadcrumbs'][] = '#'.$model->id_Hae;
?>
<div class="horarios-externos-view">

    <h1><?= Html::encode('Visualização de #'.$model->id_Hae.': '.$model->tipo) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-pencil"></span> Atualizar Horário'), ['update', 'id' => $model->id_Hae], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-remove"></span> Excluir Horário'), ['delete', 'id' => $model->id_Hae], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Quer realmente excluir este item?',
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
