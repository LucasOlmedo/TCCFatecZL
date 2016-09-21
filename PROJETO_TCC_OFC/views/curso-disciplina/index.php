<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CursoDisciplinaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cursos e Disciplinas');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="curso-disciplina-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       <?= Html::a(Yii::t('app', 'Create Curso Disciplina'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id_Curso',
            'id_Disciplina',
            'qtde_aulas',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
