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

    <?= $form->field($model, 'inicio_cps')->input('date') ?>

    <?= $form->field($model, 'inicio_fateczl')->input('date') ?>

    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Situação do professor <span class="glyphicon glyphicon-chevron-right"></span>') : Yii::t('app', 'Alterar situação <span class="glyphicon glyphicon-chevron-right"></span>'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>

</div>
