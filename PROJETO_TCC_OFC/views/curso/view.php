<?php

use app\models\CursoDisciplina;
use yii\data\SqlDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Curso */

include 'getCurso.php';
garantirAltCurso();
$this->title ="Curso #".$model->id_Curso;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cursos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = '#'.$model->id_Curso;
?>
<div class="curso-view">

    <h1><?= Html::encode('Visualização do curso #'.$model->id_Curso.': '.$model->nome_curso) ?></h1>
    <br>
    <p>
        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-pencil"></span> Alterar Curso'), ['update', 'id' => $model->id_Curso], ['class' => 'btn btn-primary']) ?>

        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-edit"></span> Alterar Disciplinas'), ['edit-disc', 'id' => $model->id_Curso], ['class' => 'btn btn-warning']) ?>

        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-remove"></span> Excluir Curso'), ['delete', 'id' => $model->id_Curso], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Deseja mesmo excluir o registro?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <br>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_Curso',
            'nome_curso',
            'abreviacao',
            'carga_horaria',
        ],
    ]) ?>
    <br>
    <h1>Disciplinas contidas nesse curso</h1>

    <?php

    $count = \app\models\GradeCurso::find()->where(['id_Curso' => $model->id_Curso])->count();

    $dataProvider = new SqlDataProvider([
        'sql' => 'SELECT nome_periodo, nome_disc, qtde_aulas FROM grade_curso
                  INNER JOIN periodo
                  ON grade_curso.id_Periodo=periodo.id_Periodo
                  INNER JOIN disciplina
                  ON grade_curso.id_Disciplina=disciplina.id_Disciplina
                  WHERE id_Curso=:idc
                  ORDER BY periodo.id_Periodo',
        'totalCount' => $count,
        'params' => [':idc' => $model->id_Curso],
    ]);
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'nome_periodo',
            'nome_disc',
            'qtde_aulas',
        ],
    ]);
    ?>



</div>
