<?php

namespace app\controllers;

use Yii;
use app\models\Diasemana;
use app\models\DiasemanaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DiasemanaController implements the CRUD actions for Diasemana model.
 */
class DiasemanaController extends Controller
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
     * Lists all Diasemana models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DiasemanaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Diasemana model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Diasemana model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Diasemana();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Diasemana model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Diasemana model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Diasemana model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_diaSemana
     * @param integer $id_Professor
     * @param integer $id_Curso
     * @param integer $id_Disciplina
     * @param integer $id_Periodo
     * @param string $turno
     * @param string $horario_inicio
     * @param string $horario_fim
     * @return DiaSemana the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_diaSemana, $id_Professor, $id_Curso, $id_Disciplina, $id_Periodo, $turno, $horario_inicio, $horario_fim)
    {
        if (($model = DiaSemana::findOne(['id_diaSemana' => $id_diaSemana, 'id_Professor' => $id_Professor, 'id_Curso' => $id_Curso, 'id_Disciplina' => $id_Disciplina, 'id_Periodo' => $id_Periodo, 'turno' => $turno, 'horario_inicio' => $horario_inicio, 'horario_fim' => $horario_fim])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
