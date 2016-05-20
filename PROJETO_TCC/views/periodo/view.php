<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Periodo */

$this->title = "Visualização de #".$model->id_Periodo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Períodos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', ' <span class="glyphicon glyphicon-pencil"></span> Alterar período'), ['update', 'id' => $model->id_Periodo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', ' <span class="glyphicon glyphicon-remove"></span> Excluir período'), ['delete', 'id' => $model->id_Periodo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Tem certeza que deseja excluir o registro?'),
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
