<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Curso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="curso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abreviacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'carga_horaria')->textInput() ?>


    <div class="form-group">
       <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Incluir Disciplinas >>') : Yii::t('app', 'Alterar Disciplinas'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary'])  ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
