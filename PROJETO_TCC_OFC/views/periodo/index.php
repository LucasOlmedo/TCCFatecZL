<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PeriodoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Períodos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
      <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-plus-sign"></span> Novo Período'), ['create'], ['class' => 'btn btn-primary'], ['span' => 'glyphicon glyphicon-align-left']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id_Periodo',
            'nome_periodo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php
    if (isset($_GET['erro'])) {
        echo "
            <script> 
                alert('O elemento está em relacionamento com outros dados.\\n\\nNão foi possível deletar.');
                window.location.href = \"index.php?r=periodo/index\"; 
            </script>
        ";
    }
    ?>
</div>
