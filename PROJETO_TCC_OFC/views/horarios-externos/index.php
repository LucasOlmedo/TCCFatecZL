<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HorariosExternosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Horarios Externos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horarios-externos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Horarios Externos', ['create'], ['class' => 'btn btn-success']) ?>
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
