<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProfessorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="professor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_Professor') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'rg') ?>

    <?= $form->field($model, 'categoria') ?>

    <?= $form->field($model, 'graduacao') ?>

    <?php // echo $form->field($model, 'contrato') ?>

    <?php // echo $form->field($model, 'sede') ?>

    <?php // echo $form->field($model, 'inicio_cps') ?>

    <?php // echo $form->field($model, 'inicio_fateczl') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
