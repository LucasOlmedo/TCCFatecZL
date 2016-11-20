<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Situacao */

$this->title = Yii::t('app', 'Atualizar {modelClass}: ', [
    'modelClass' => 'Situação',
]) . ' ' . $model->id_Situacao.': '.$model->nome;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Situação'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_Situacao, 'url' => ['view', 'id' => $model->id_Situacao]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Atualizar');
?>
<div class="situacao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
