<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HorariosExternosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Horários';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horarios-externos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-plus-sign"></span> Novo Horário'), ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_Hae',
            'tipo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
