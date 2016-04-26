<?php

namespace app\controllers;

use Yii;
use app\models\CursoDisciplina;
use app\models\CursoDisciplinaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CursoDisciplinaController implements the CRUD actions for CursoDisciplina model.
 */
class CursoDisciplinaController extends Controller
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
     * Lists all CursoDisciplina models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CursoDisciplinaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CursoDisciplina model.
     * @param integer $id_Curso
     * @param integer $id_Disciplina
     * @return mixed
     */
    public function actionView($id_Curso, $id_Disciplina)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_Curso, $id_Disciplina),
        ]);
    }

    /**
     * Creates a new CursoDisciplina model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CursoDisciplina();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_Curso' => $model->id_Curso, 'id_Disciplina' => $model->id_Disciplina]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CursoDisciplina model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_Curso
     * @param integer $id_Disciplina
     * @return mixed
     */
    public function actionUpdate($id_Curso, $id_Disciplina)
    {
        $model = $this->findModel($id_Curso, $id_Disciplina);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_Curso' => $model->id_Curso, 'id_Disciplina' => $model->id_Disciplina]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CursoDisciplina model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_Curso
     * @param integer $id_Disciplina
     * @return mixed
     */
    public function actionDelete($id_Curso, $id_Disciplina)
    {
        $this->findModel($id_Curso, $id_Disciplina)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CursoDisciplina model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_Curso
     * @param integer $id_Disciplina
     * @return CursoDisciplina the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_Curso, $id_Disciplina)
    {
        if (($model = CursoDisciplina::findOne(['id_Curso' => $id_Curso, 'id_Disciplina' => $id_Disciplina])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
