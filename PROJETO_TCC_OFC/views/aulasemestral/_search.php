<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AulasemestralSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aulasemestral-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_Curso') ?>

    <?= $form->field($model, 'id_Periodo') ?>

    <?= $form->field($model, 'id_Disciplina') ?>

    <?= $form->field($model, 'id_Professor') ?>

    <?php // echo $form->field($model, 'turno') ?>

    <?php // echo $form->field($model, 'data_inicio') ?>

    <?php // echo $form->field($model, 'data_fim') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
