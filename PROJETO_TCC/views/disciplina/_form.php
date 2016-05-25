<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Disciplina */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="disciplina-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome_disc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abreviacao')->textInput(['maxlength' => true]) ?>

    <?php
    $hx = \app\models\HorariosExternos::find()->all();

    $listData_hx= ArrayHelper::map($hx, 'id_Hae', 'tipo');

    echo $form->field($model, 'externo')->dropDownList($listData_hx);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '<span class="glyphicon glyphicon-ok"></span> Salvar') : Yii::t('app', '<span class="glyphicon glyphicon-ok"></span> Atualizar'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
