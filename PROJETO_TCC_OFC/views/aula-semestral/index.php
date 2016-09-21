<?php

use app\models\AulaSemestral;
use yii\data\SqlDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AulaSemestralSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Aula Semestral');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aula-semestral-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-plus-sign"></span> Nova Aula Semestral'), ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

<?php

/*    $count = AulaSemestral::find()->count();

    $dataProvider = new SqlDataProvider([
        'sql' => 'SELECT nome_curso, nome_periodo, nome_disc,
                  professor.`nome`, turno, data_inicio, data_fim, aulasemestral.`id_Curso`,
                  aulasemestral.`id_Periodo`, aulasemestral.`id_Disciplina`, aulasemestral.`id_Professor`
                  FROM aulasemestral
                  INNER JOIN curso
                  ON aulasemestral.`id_Curso`=curso.`id_Curso`
                  INNER JOIN periodo
                  ON aulasemestral.`id_Periodo` = periodo.`id_Periodo`
                  INNER JOIN disciplina
                  ON aulasemestral.`id_Disciplina` = disciplina.`id_Disciplina`
                  INNER JOIN professor
                  ON aulasemestral.`id_Professor` = professor.`id_Professor`',
        'totalCount' => $count,
    ]);*/

    /*echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'nome_curso' => ['label' => 'Curso', 'value' => 'nome_curso'],
            'nome_periodo' => ['label' => 'Período', 'value' => 'nome_periodo'],
            'nome_disc' => ['label' => 'Disciplina', 'value' => 'nome_disc'],
            'nome' => ['label' => 'Professor', 'value' => 'nome'],
            [
                'attribute' => 'turno',
                'format' => 'raw',
                'filter' => ["0" => "Manhã", "1" => "Tarde", "2" => "Noite"],
                'value' => function ($model) {
                    if ($model['turno'] == 0) return "Manhã";
                    if ($model['turno'] == 1) return "Tarde";
                    if ($model['turno'] == 2) return "Noite";

                    return "";
                }
            ],
        ],
    ]);*/

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id_Curso',
            'id_Periodo',
            'id_Disciplina',
            'id_Professor',
            /*'nome_curso' => ['label' => 'Curso', 'value' => 'nome_curso'],
            'nome_periodo' => ['label' => 'Período', 'value' => 'nome_periodo'],
            'nome_disc' => ['label' => 'Disciplina', 'value' => 'nome_disc'],
            'nome' => ['label' => 'Professor', 'value' => 'nome'],*/
            [
                'attribute' => 'turno',
                'value' => function ($model) {
                    if ($model['turno'] == 0) return "Manhã";
                    if ($model['turno'] == 1) return "Tarde";
                    if ($model['turno'] == 2) return "Noite";
                    return $model;
                }
            ],
/*             'data_inicio',
             'data_fim',*/
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);

?>

</div>
