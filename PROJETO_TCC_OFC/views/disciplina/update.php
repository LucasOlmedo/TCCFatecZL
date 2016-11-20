<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Disciplina */

$this->title = Yii::t('app', 'Atualizar {modelClass}  #', [
    'modelClass' => 'Disciplina',
]) . $model->id_Disciplina;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Disciplinas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '#'.$model->id_Disciplina, 'url' => ['view', 'id' => $model->id_Disciplina]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Atualizar disciplina');
?>
<div class="disciplina-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
