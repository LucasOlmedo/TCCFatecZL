<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GradeCursoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grade-curso-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_Curso') ?>

    <?= $form->field($model, 'id_Periodo') ?>

    <?= $form->field($model, 'id_Disciplina') ?>

    <?= $form->field($model, 'qtde_aulas') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
