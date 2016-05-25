<?php

namespace app\controllers;

use app\models\GradeCurso;
use app\models\Periodo;
use app\models\PeriodoSearch;
use Yii;
use app\models\AulaSemestral;
use app\models\AulaSemestralSearch;
use yii\db\ActiveQuery;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AulaSemestralController implements the CRUD actions for AulaSemestral model.
 */
class AulaSemestralController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all AulaSemestral models.
     * @return mixed
     */
    public function actionIndex()
    {

        $model = new AulaSemestral();
        $searchModel = new AulaSemestralSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }

    /**
     * Displays a single AulaSemestral model.
     * @param integer $id_Curso
     * @param integer $id_Periodo
     * @param integer $id_Disciplina
     * @param string $turno
     * @param string $data_inicio
     * @param string $data_fim
     * @return mixed
     */
    public function actionView($id_Curso, $id_Periodo, $id_Disciplina, $turno, $data_inicio, $data_fim)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_Curso, $id_Periodo, $id_Disciplina, $turno, $data_inicio, $data_fim),
        ]);
    }

    /**
     * Creates a new AulaSemestral model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AulaSemestral();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_Curso' => $model->id_Curso, 'id_Periodo' => $model->id_Periodo, 'id_Disciplina' => $model->id_Disciplina, 'turno' => $model->turno, 'data_inicio' => $model->data_inicio, 'data_fim' => $model->data_fim]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AulaSemestral model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_Curso
     * @param integer $id_Periodo
     * @param integer $id_Disciplina
     * @param string $turno
     * @param string $data_inicio
     * @param string $data_fim
     * @return mixed
     */
    public function actionUpdate($id_Curso, $id_Periodo, $id_Disciplina, $turno, $data_inicio, $data_fim)
    {
        $model = $this->findModel($id_Curso, $id_Periodo, $id_Disciplina, $turno, $data_inicio, $data_fim);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_Curso' => $model->id_Curso, 'id_Periodo' => $model->id_Periodo, 'id_Disciplina' => $model->id_Disciplina, 'turno' => $model->turno, 'data_inicio' => $model->data_inicio, 'data_fim' => $model->data_fim]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AulaSemestral model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_Curso
     * @param integer $id_Periodo
     * @param integer $id_Disciplina
     * @param string $turno
     * @param string $data_inicio
     * @param string $data_fim
     * @return mixed
     */
    public function actionDelete($id_Curso, $id_Periodo, $id_Disciplina, $turno, $data_inicio, $data_fim)
    {
        $this->findModel($id_Curso, $id_Periodo, $id_Disciplina, $turno, $data_inicio, $data_fim)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AulaSemestral model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_Curso
     * @param integer $id_Periodo
     * @param integer $id_Disciplina
     * @param string $turno
     * @param string $data_inicio
     * @param string $data_fim
     * @return AulaSemestral the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_Curso, $id_Periodo, $id_Disciplina, $turno, $data_inicio, $data_fim)
    {
        if (($model = AulaSemestral::findOne(['id_Curso' => $id_Curso, 'id_Periodo' => $id_Periodo, 'id_Disciplina' => $id_Disciplina, 'turno' => $turno, 'data_inicio' => $data_inicio, 'data_fim' => $data_fim])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionListcurso($id)
    {
        $rows = GradeCurso::find()
            ->joinWith('periodo')
            ->where(['id_Curso' => $id])
            ->groupBy('id_Periodo')
            ->all();

        echo "<option>Selecione um período...</option>";

        if(count($rows)>0){
            foreach($rows as $row){
                echo "<option value='$row->id_Periodo'>".$row->periodo->nome_periodo."</option>";
            }
        }

    }

    public function actionListdisc($id, $idCurso)
    {

        $rows = GradeCurso::find()
            ->joinWith('disciplina')
            ->where(['id_Curso' => $idCurso, 'id_Periodo' => $id])
            ->all();

        echo "<option>Selecione uma disciplina...</option>";

        if(count($rows)>0){
            foreach($rows as $row){
                echo "<option value='$row->id_Disciplina'>".$row->disciplina->nome."</option>";
            }
        }

    }
}
