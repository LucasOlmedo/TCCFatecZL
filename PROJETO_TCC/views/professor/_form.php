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

    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Finalizar cadastro >>') : Yii::t('app', 'Alterar situação >>'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>

</div>
