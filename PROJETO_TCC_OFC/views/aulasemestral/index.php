<?php

use app\models\Aulasemestral;
use yii\data\SqlDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AulasemestralSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Grade Semestral';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aulasemestral-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus-sign"></span> Nova Grade Semestral', ['create'], ['class' => 'btn btn-primary'], ['span' => 'glyphicon glyphicon-align-left']) ?>
    </p>

    <?php

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                'label' => 'Nome do Curso',
                'value' => function ($model) {
                    $modelCurso = \app\models\Curso::find()->where(['id_Curso' => $model['id_Curso']])->one();
                    return $modelCurso->nome_curso;
                }
            ],
            [
                'label' => 'Periodo',
                'value' => function ($model) {
                    $modelPer = \app\models\Periodo::find()->where(['id_Periodo' => $model['id_Periodo']])->one();
                    return $modelPer->nome_periodo;
                }
            ],
            [
                'label' => 'Disciplina',
                'value' => function ($model) {
                    $modelDisc = \app\models\Disciplina::find()->where(['id_Disciplina' => $model['id_Disciplina']])->one();
                    return $modelDisc->nome_disc;
                }
            ],
            [
                'label' => 'Nome do Professor',
                'value' => function ($model) {
                    $modelProf = \app\models\Professor::find()->where(['id_Professor' => $model['id_Professor']])->one();
                    return $modelProf->nome;
                }
            ],
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
//                'data_inicio',
//                'data_fim',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {edit-dia}',
                'buttons' => [
                    'edit-dia' => function ($url) {
                        return Html::a('<span class="glyphicon glyphicon-edit"></span>', $url);
                    },
                ],
            ],
        ],
    ]);

    ?>

</div>
