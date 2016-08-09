<?php

namespace app\controllers;

use Yii;
use app\models\DiaSemana;
use app\models\DiaSemanaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DiaSemanaController implements the CRUD actions for DiaSemana model.
 */
class DiaSemanaController extends Controller
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
     * Lists all DiaSemana models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DiaSemanaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DiaSemana model.
     * @param integer $id_diaSemana
     * @param integer $id_Professor
     * @param integer $id_Curso
     * @param integer $id_Disciplina
     * @param integer $id_Periodo
     * @param string $data_inicio
     * @param string $data_fim
     * @param string $horario_inicio
     * @param string $horario_fim
     * @return mixed
     */
    public function actionView($id_diaSemana, $id_Professor, $id_Curso, $id_Disciplina, $id_Periodo, $data_inicio, $data_fim, $horario_inicio, $horario_fim)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_diaSemana, $id_Professor, $id_Curso, $id_Disciplina, $id_Periodo, $data_inicio, $data_fim, $horario_inicio, $horario_fim),
        ]);
    }

    /**
     * Creates a new DiaSemana model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DiaSemana();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_diaSemana' => $model->id_diaSemana, 'id_Professor' => $model->id_Professor, 'id_Curso' => $model->id_Curso, 'id_Disciplina' => $model->id_Disciplina, 'id_Periodo' => $model->id_Periodo, 'data_inicio' => $model->data_inicio, 'data_fim' => $model->data_fim, 'horario_inicio' => $model->horario_inicio, 'horario_fim' => $model->horario_fim]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DiaSemana model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_diaSemana
     * @param integer $id_Professor
     * @param integer $id_Curso
     * @param integer $id_Disciplina
     * @param integer $id_Periodo
     * @param string $data_inicio
     * @param string $data_fim
     * @param string $horario_inicio
     * @param string $horario_fim
     * @return mixed
     */
    public function actionUpdate($id_diaSemana, $id_Professor, $id_Curso, $id_Disciplina, $id_Periodo, $data_inicio, $data_fim, $horario_inicio, $horario_fim)
    {
        $model = $this->findModel($id_diaSemana, $id_Professor, $id_Curso, $id_Disciplina, $id_Periodo, $data_inicio, $data_fim, $horario_inicio, $horario_fim);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_diaSemana' => $model->id_diaSemana, 'id_Professor' => $model->id_Professor, 'id_Curso' => $model->id_Curso, 'id_Disciplina' => $model->id_Disciplina, 'id_Periodo' => $model->id_Periodo, 'data_inicio' => $model->data_inicio, 'data_fim' => $model->data_fim, 'horario_inicio' => $model->horario_inicio, 'horario_fim' => $model->horario_fim]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DiaSemana model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_diaSemana
     * @param integer $id_Professor
     * @param integer $id_Curso
     * @param integer $id_Disciplina
     * @param integer $id_Periodo
     * @param string $data_inicio
     * @param string $data_fim
     * @param string $horario_inicio
     * @param string $horario_fim
     * @return mixed
     */
    public function actionDelete($id_diaSemana, $id_Professor, $id_Curso, $id_Disciplina, $id_Periodo, $data_inicio, $data_fim, $horario_inicio, $horario_fim)
    {
        $this->findModel($id_diaSemana, $id_Professor, $id_Curso, $id_Disciplina, $id_Periodo, $data_inicio, $data_fim, $horario_inicio, $horario_fim)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DiaSemana model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_diaSemana
     * @param integer $id_Professor
     * @param integer $id_Curso
     * @param integer $id_Disciplina
     * @param integer $id_Periodo
     * @param string $data_inicio
     * @param string $data_fim
     * @param string $horario_inicio
     * @param string $horario_fim
     * @return DiaSemana the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_diaSemana, $id_Professor, $id_Curso, $id_Disciplina, $id_Periodo, $data_inicio, $data_fim, $horario_inicio, $horario_fim)
    {
        if (($model = DiaSemana::findOne(['id_diaSemana' => $id_diaSemana, 'id_Professor' => $id_Professor, 'id_Curso' => $id_Curso, 'id_Disciplina' => $id_Disciplina, 'id_Periodo' => $id_Periodo, 'data_inicio' => $data_inicio, 'data_fim' => $data_fim, 'horario_inicio' => $horario_inicio, 'horario_fim' => $horario_fim])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
