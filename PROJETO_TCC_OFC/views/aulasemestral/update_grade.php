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
                $.get( "'.Url::toRoute('/aulasemestral/listcurso').'", { id: $(this).val() } )
                    .done(function( data ) {
                        $( "#'.Html::getInputId($model, 'id_Periodo').'" ).html( data );
                    }
                );
                $.get( "'.Url::toRoute('/aulasemestral/listdisc').'", {
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
                $.get( "'.Url::toRoute('/aulasemestral/listdisc').'", {
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
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Alterar horários semanais <span class="glyphicon glyphicon-chevron-right"></span>') : Yii::t('app',
            'Salvar alteração <span class="glyphicon glyphicon-ok"></span>'),
            [
                'class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary'
            ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
document.addEventListener('DOMContentLoaded',function(){
    openAjaxPeriodo();
    openAjaxDisciplina();
});

function openAjaxPeriodo(){
    if(document.getElementById('aulasemestral-id_curso').value != ""){
        var idCurso = document.getElementById('aulasemestral-id_curso').value;  

        if(window.XMLHttpRequest){
            req = new XMLHttpRequest();
        } else{
            req = new new ActiveXObject("Microsoft.XMLHTTP");
        }

        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                var text = "[" + req.responseText + "]";
                limparPeriodo();
                exibePeriodo(text.replace("}{","},{"));
            }
        }
        req.open('GET','/getPeriodo.php?idCurso='+idCurso,false);
        req.send(); 
    }
}

function openAjaxDisciplina(){
    if(document.getElementById('aulasemestral-id_periodo').value != ""){
        var idCurso = document.getElementById('aulasemestral-id_curso').value;  
        var idPeriodo = document.getElementById('aulasemestral-id_periodo').value;  

        if(window.XMLHttpRequest){
            req = new XMLHttpRequest();
        } else{
            req = new new ActiveXObject("Microsoft.XMLHTTP");
        }

        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                var text = "[" + req.responseText + "]";
                limparDisciplina();
                exibeDisciplina(text.replace("}{","},{"));
            }
        }
        req.open('GET','/getDisciplina.php?idCurso='+idCurso+'&idPeriodo='+idPeriodo,false);
        req.send(); 
    }
}

function limparPeriodo(){
    document.getElementById('aulasemestral-id_periodo').innerHTML = '<option value="null">Selecione um período...</option>';
}

function limparDisciplina(){
    document.getElementById('aulasemestral-id_disciplina').innerHTML = '<option value="null">Selecione uma disciplina...</option>';
}

function exibePeriodo(periodoJSON){
    var periodos = JSON.parse(periodoJSON);

    for(periodo in periodos){
        document.getElementById('aulasemestral-id_periodo').innerHTML += '<option class="periodoSel" value="'+periodos[periodo].id_Periodo+'">'+periodos[periodo].nome_Periodo+'</option>'       
    }

    openAjaxIdPeriodo();
}   

function exibeDisciplina(disciplinaJSON){
    var disciplinas = JSON.parse(disciplinaJSON);

    for(disc in disciplinas){
        document.getElementById('aulasemestral-id_disciplina').innerHTML += '<option class="disciplinaSel" value="'+disciplinas[disc].id_Disciplina+'">'+disciplinas[disc].nome_Disc+'</option>'       
    }

    openAjaxIdDisciplina();
}   

function openAjaxIdPeriodo(){
    var idAula = $('h1').text().split('#')[1];

    var selectPeriodo = document.getElementById('aulasemestral-id_periodo');

    if(selectPeriodo.options.length > 1){

        if(window.XMLHttpRequest){
            req = new XMLHttpRequest();
        } else{
            req = new new ActiveXObject("Microsoft.XMLHTTP");
        }

        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                var text = "[" + req.responseText + "]";
                trocaPeriodo(text);
           }
        }
        req.open('GET','/getPeriodo.php?idAula='+idAula,false);
        req.send();  
    }
}

function openAjaxIdDisciplina(){
    var idAula = $('h1').text().split('#')[1];

    var selectDisc = document.getElementById('aulasemestral-id_disciplina');

    if(selectDisc.options.length > 1){

        if(window.XMLHttpRequest){
            req = new XMLHttpRequest();
        } else{
            req = new new ActiveXObject("Microsoft.XMLHTTP");
        }

        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                var text = "[" + req.responseText + "]";
                trocaDisciplina(text);
           }
        }
        req.open('GET','/getDisciplina.php?idAula='+idAula,false);
        req.send();  
    }
}

function trocaPeriodo(periodoJSON){
    periodo = JSON.parse(periodoJSON)[0].id_Periodo;
    
    var classPeriodo = $('.periodoSel');

    var selectPeriodo = document.getElementById('aulasemestral-id_periodo');

    for(sel in classPeriodo){
        if(classPeriodo[sel].value == periodo){
            selectPeriodo.options[Number(sel)+1].setAttribute('selected','true');
        }
    }
}

function trocaDisciplina(disciplinaJSON){
    disciplina = JSON.parse(disciplinaJSON)[0].id_Disciplina;
    
    var classDisciplina = $('.disciplinaSel');

    var selectDisc = document.getElementById('aulasemestral-id_disciplina');

    for(sel in classDisciplina){
        if(classDisciplina[sel].value == disciplina){
            selectDisc.options[Number(sel)+1].setAttribute('selected','true');
        }
    }
}

</script>