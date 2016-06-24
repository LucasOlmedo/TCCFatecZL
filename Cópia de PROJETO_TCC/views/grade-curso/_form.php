<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GradeCurso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grade-curso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_Curso')->textInput() ?>

    <?= $form->field($model, 'id_Periodo')->textInput() ?>

    <?= $form->field($model, 'id_Disciplina')->textInput() ?>

    <?= $form->field($model, 'ano_letivo')->textInput() ?>

    <?= $form->field($model, 'qtde_aulas')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
