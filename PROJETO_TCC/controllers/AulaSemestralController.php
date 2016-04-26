<?php

namespace app\controllers;

use Yii;
use app\models\AulaSemestral;
use app\models\AulaSemestralSearch;
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
        $searchModel = new AulaSemestralSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AulaSemestral model.
     * @param integer $id_Professor
     * @param integer $id_Curso
     * @param integer $id_Disciplina
     * @param integer $semestre
     * @param string $turno
     * @return mixed
     */
    public function actionView($id_Professor, $id_Curso, $id_Disciplina, $semestre, $turno)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_Professor, $id_Curso, $id_Disciplina, $semestre, $turno),
        ]);
    }

    /**
     * Creates a new AulaSemestral model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model_aula = new AulaSemestral();

        if ($model_aula->load(Yii::$app->request->post()) && $model_aula->save()) {
            return $this->redirect(['view', 'id_Professor' => $model_aula->id_Professor, 'id_Curso' => $model_aula->id_Curso, 'id_Disciplina' => $model_aula->id_Disciplina, 'semestre' => $model_aula->semestre, 'turno' => $model_aula->turno]);
        } else {
            return $this->render('add_dia', [
                'model' => $model_aula,
            ]);
        }
    }

    /**
     * Updates an existing AulaSemestral model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_Professor
     * @param integer $id_Curso
     * @param integer $id_Disciplina
     * @param integer $semestre
     * @param string $turno
     * @return mixed
     */
    public function actionUpdate($id_Professor, $id_Curso, $id_Disciplina, $semestre, $turno)
    {
        $model = $this->findModel($id_Professor, $id_Curso, $id_Disciplina, $semestre, $turno);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_Professor' => $model->id_Professor, 'id_Curso' => $model->id_Curso, 'id_Disciplina' => $model->id_Disciplina, 'semestre' => $model->semestre, 'turno' => $model->turno]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AulaSemestral model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_Professor
     * @param integer $id_Curso
     * @param integer $id_Disciplina
     * @param integer $semestre
     * @param string $turno
     * @return mixed
     */
    public function actionDelete($id_Professor, $id_Curso, $id_Disciplina, $semestre, $turno)
    {
        $this->findModel($id_Professor, $id_Curso, $id_Disciplina, $semestre, $turno)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AulaSemestral model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_Professor
     * @param integer $id_Curso
     * @param integer $id_Disciplina
     * @param integer $semestre
     * @param string $turno
     * @return AulaSemestral the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_Professor, $id_Curso, $id_Disciplina, $semestre, $turno)
    {
        if (($model = AulaSemestral::findOne(['id_Professor' => $id_Professor, 'id_Curso' => $id_Curso, 'id_Disciplina' => $id_Disciplina, 'semestre' => $semestre, 'turno' => $turno])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
