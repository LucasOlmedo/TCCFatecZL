<?php

use app\models\CursoDisciplina;
use yii\data\SqlDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Curso */

$this->title ="Visualização de #".$model->id_Curso;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cursos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="curso-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Alterar Curso'), ['update', 'id' => $model->id_Curso], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Alterar Disciplinas'), ['edit-disc', 'id' => $model->id_Curso], ['class' => 'btn btn-warning']) ?>
        <?= Html::a(Yii::t('app', 'Excluir'), ['delete', 'id' => $model->id_Curso], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Deseja mesmo excluir o registro?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_Curso',
            'nome',
            'abreviacao',
            'carga_horaria',
        ],
    ]) ?>

    <h1>Disciplinas desse curso</h1>

    <?php

    $count = CursoDisciplina::find()->where(['id_Curso' => $model->id_Curso])->count();

    $dataProvider = new SqlDataProvider([
        'sql' => 'SELECT nome, qtde_aulas FROM curso_disciplina
                  INNER JOIN disciplina
                  ON curso_disciplina.id_Disciplina=disciplina.id_Disciplina
                  WHERE id_Curso=:idc',
        'totalCount' => $count,
        'params' => [':idc' => $model->id_Curso],
    ]);
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'nome',
            'qtde_aulas',
        ],
    ]);
    ?>



</div>
