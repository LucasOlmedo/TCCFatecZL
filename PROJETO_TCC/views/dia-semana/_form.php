<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DiaSemana */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dia-semana-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_diaSemana')->textInput() ?>

    <?= $form->field($model, 'id_Professor')->textInput() ?>

    <?= $form->field($model, 'id_Curso')->textInput() ?>

    <?= $form->field($model, 'id_Disciplina')->textInput() ?>

    <?= $form->field($model, 'id_Periodo')->textInput() ?>

    <?= $form->field($model, 'data_inicio')->textInput() ?>

    <?= $form->field($model, 'data_fim')->textInput() ?>

    <?= $form->field($model, 'horario_inicio')->textInput() ?>

    <?= $form->field($model, 'horario_fim')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
