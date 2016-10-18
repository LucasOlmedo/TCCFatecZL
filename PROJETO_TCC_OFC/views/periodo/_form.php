<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Periodo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="periodo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_Periodo')->textInput() ?>

    <?= $form->field($model, 'nome_periodo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '<span class="glyphicon glyphicon-ok"></span> Salvar') : Yii::t('app', '<span class="glyphicon glyphicon-ok"></span> Atualizar') , ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
