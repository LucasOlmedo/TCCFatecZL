<?php
/**
 * Created by PhpStorm.
 * User: LucasOlmedo
 * Date: 20/04/2016
 * Time: 10:53
 */


$this->title = Yii::t('app', 'Incluir dia da semana');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Aula Semestral'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="aula-dia-form">
    <div class="form-group">
        <h2>Incluir dia da semana</h2>
        <label for="select_prof">Professor</label>
        <select class="form-control" id="select_prof">




        </select>
        <br>
        <label for="select_curso">Curso</label>
        <select class="form-control" id="select_curso">




        </select>
        <br>
        <label for="select_dia">Dia da semana</label>
        <select class="form-control" id="select_dia">




        </select>
        <br>
        <button class="btn btn-default" type="submit" id="btn-add-disc"><span class="glyphicon glyphicon-plus"></span>  Adicionar ao canlendário semestral</button>
        <br>
        <br>
        <br>
        <table class="table table-bordered table-hover table-striped" id="table-disc">
            <thead>
            <th>Professor</th>
            <th>Curso</th>
            <th>Dia Semana</th>
            <th>Opções</th>
            </thead>
            <tbody>

            </tbody>
        </table>
        <br>
        <button class="btn btn-primary" type="submit" id="btnSalvarArray"><span class="glyphicon glyphicon-ok"></span> Salvar</button>
    </div>
</div>