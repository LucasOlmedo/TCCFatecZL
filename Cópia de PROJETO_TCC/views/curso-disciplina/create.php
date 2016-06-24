<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CursoDisciplina */

$this->title = Yii::t('app', 'Create Curso Disciplina');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Curso Disciplinas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="curso-disciplina-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
