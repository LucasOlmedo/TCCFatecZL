<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Periodo */

$this->title = Yii::t('app', 'Create Periodo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Periodos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
