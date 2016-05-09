<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DiaSemana */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dia-semana-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_Professor')->dropDownList(\app\models\ProfessorSearch::find()->select(
        ['nome', 'id_Professor'])->indexBy('id')->column(),['prompt'=>'Selecione o professor...']
    ) ?>

    <?= $form->field($model, 'id_Curso')->dropDownList(\app\models\CursoSearch::find()->select(
        ['nome', 'id_Curso'])->indexBy('id')->column(),['prompt'=>'Selecione o curso...']
    ) ?>

    <?= $form->field($model, 'id_Disciplina')->dropDownList(\app\models\DisciplinaSearch::find()->select(
        ['nome', 'id_Disciplina'])->indexBy('id')->column(),['prompt'=>'Selecione a disciplina...']
    ) ?>

    <?= $form->field($model, 'semestre')->textInput() ?>

    <?= $form->field($model, 'turno')->dropDownList(['Manhã', 'Tarde', 'Noite'], ['prompt'=>'Selecione o turno...']) ?>

    <?= $form->field($model, 'horario')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '<span class="glyphicon glyphicon-ok"></span> Salvar') : Yii::t('app', '<span class="glyphicon glyphicon-ok"></span> Atualizar'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
