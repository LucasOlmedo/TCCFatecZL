<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DiaSemana */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dia-semana-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_Professor')->textInput() ?>

    <?= $form->field($model, 'id_Curso')->textInput() ?>

    <?= $form->field($model, 'id_Disciplina')->textInput() ?>

    <?= $form->field($model, 'semestre')->textInput() ?>

    <?= $form->field($model, 'turno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'horario')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
