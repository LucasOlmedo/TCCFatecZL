<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Aulasemestral */

$this->title = Yii::t('app', 'Inserir nova Aula Semestral');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Grade Semestral'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aulasemestral-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
