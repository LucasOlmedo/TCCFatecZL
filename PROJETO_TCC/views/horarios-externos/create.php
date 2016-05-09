<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HorariosExternos */

$this->title = Yii::t('app', 'Inserir novo Horario Externo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Horarios Externos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horarios-externos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
