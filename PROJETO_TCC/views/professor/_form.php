<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Professor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="professor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'graduacao')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'contrato')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sede')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inicio_cps')->textInput() ?>

    <?= $form->field($model, 'inicio_fateczl')->textInput() ?>

    <div class="form-group">
        <label for="select_disc">Situação</label>
        <select class="form-control" id="select_disc">
            <option value='selecione'>Selecione a situação...</option>";
        </select>
        <br>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Salvar') : Yii::t('app', 'Atualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
