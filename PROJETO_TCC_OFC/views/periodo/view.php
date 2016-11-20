<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Periodo */

$this->title = 'Período #'.$model->id_Periodo;
$this->params['breadcrumbs'][] = ['label' => 'Períodos', 'url' => ['index']];
$this->params['breadcrumbs'][] = '#'.$model->id_Periodo;;
?>
<div class="periodo-view">

    <h1><?= Html::encode('Visualização do período #'.$model->id_Periodo.': '.$model->nome_periodo) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-pencil"></span> Alterar Período'), ['update', 'id' => $model->id_Periodo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-remove"></span> Excluir Período'), ['delete', 'id' => $model->id_Periodo], [
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
            'id_Periodo',
            'nome_periodo',
        ],
    ]) ?>

</div>
