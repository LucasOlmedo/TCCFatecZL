<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Professor */

$this->title = Yii::t('app', 'Inserir novo Professor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Professores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="professor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
