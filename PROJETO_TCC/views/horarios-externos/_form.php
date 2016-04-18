<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HorariosExternos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="horarios-externos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_Hae')->textInput() ?>

    <?= $form->field($model, 'id_Disciplina')->textInput() ?>

    <?= $form->field($model, 'tipo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
