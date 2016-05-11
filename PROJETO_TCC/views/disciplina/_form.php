<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Disciplina */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="disciplina-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <label>
        <input type="checkbox" id="checkbox_hae" onclick="habilitar()"/>  Horário Externo <br/>
    </label>
    <br/>
    <br/>

    <?= $form->field($model, 'externo')->dropDownList(\app\models\HorariosExternosSearch::find()->select(
        ['tipo', 'id_Hae'])->indexBy('id_Hae')->column(),[ 'prompt' => 'Sem horário externo']
    )?>

    <br>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '<span class="glyphicon glyphicon-ok"></span> Salvar') : Yii::t('app', '<span class="glyphicon glyphicon-ok"></span> Atualizar'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">

    document.getElementById("disciplina-externo").disabled = true;

    function habilitar(){

        document.getElementById("disciplina-externo").disabled = document.getElementById("checkbox_hae").checked != true;

        if (document.getElementById("checkbox_hae").checked != true){
            document.getElementById("disciplina-externo").val(null);
        }

    }

</script>
