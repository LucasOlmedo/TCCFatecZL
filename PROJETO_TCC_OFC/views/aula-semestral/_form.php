<?php

use app\models\CursoSearch;
use app\models\Disciplina;
use app\models\DisciplinaSearch;
use app\models\Periodo;
use app\models\PeriodoSearch;
use app\models\ProfessorSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AulaSemestral */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aula-semestral-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $cursos = CursoSearch::find()->asArray()->all();
    $listData_curso = ArrayHelper::map($cursos, 'id_Curso', 'nome_curso');
    echo $form->field($model, 'id_Curso')->dropDownList($listData_curso,
        ['prompt' => 'Selecione um curso...',
            'onchange'=>'
                $.get( "'.Url::toRoute('/aula-semestral/listcurso').'", { id: $(this).val() } )
                    .done(function( data ) {
                        $( "#'.Html::getInputId($model, 'id_Periodo').'" ).html( data );
                    }
                );
                $.get( "'.Url::toRoute('/aula-semestral/listdisc').'", {
                idCurso: $(this).val(),
                id: $("#aulasemestral-id_periodo").val()
                })
                    .done(function( data ) {
                        $( "#'.Html::getInputId($model, 'id_Disciplina').'" ).html( data );
                    }
                );
            '
        ]
    );
    ?>

    <?php
    echo $form->field($model, 'id_Periodo')->dropDownList(
        array("null" => "Selecione um período..."),
        [
            'onchange'=>'
                $.get( "'.Url::toRoute('/aula-semestral/listdisc').'", {
                id: $(this).val(),
                idCurso: $("#aulasemestral-id_curso").val()
                })
                    .done(function( data ) {
                        $( "#'.Html::getInputId($model, 'id_Disciplina').'" ).html( data );
                    }
                );
            '
        ]
    );
    ?>

    <?php
    echo $form->field($model, 'id_Disciplina')->dropDownList(
        array("null" => "Selecione uma disciplina..."));
    ?>

    <?php
    $prof = ProfessorSearch::find()->all();
    $listData_prof = ArrayHelper::map($prof, 'id_Professor', 'nome');
    echo $form->field($model, 'id_Professor')->dropDownList(
        $listData_prof, ['prompt' => 'Selecione um professor...']);
    ?>

    <?= $form->field($model, 'turno')->dropDownList(['Manhã', 'Tarde', 'Noite'],
        ['prompt' => 'Selecione o turno...'])
    ?>

    <?= $form->field($model, 'data_inicio')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'data_fim')->textInput(['type' => 'date']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Salvar <span class="glyphicon glyphicon-ok"></span> ') : Yii::t('app', 'Atualizar <span class="glyphicon glyphicon-ok"></span>'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
