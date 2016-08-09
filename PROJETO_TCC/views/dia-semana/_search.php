<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DiaSemanaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dia-semana-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_diaSemana') ?>

    <?= $form->field($model, 'id_Professor') ?>

    <?= $form->field($model, 'id_Curso') ?>

    <?= $form->field($model, 'id_Disciplina') ?>

    <?= $form->field($model, 'id_Periodo') ?>

    <?php // echo $form->field($model, 'data_inicio') ?>

    <?php // echo $form->field($model, 'data_fim') ?>

    <?php // echo $form->field($model, 'horario_inicio') ?>

    <?php // echo $form->field($model, 'horario_fim') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
