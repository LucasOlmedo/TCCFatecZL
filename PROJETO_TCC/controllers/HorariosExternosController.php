<?php

namespace app\controllers;

use Yii;
use app\models\HorariosExternos;
use app\models\HorariosExternosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HorariosExternosController implements the CRUD actions for HorariosExternos model.
 */
class HorariosExternosController extends Controller
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
     * Lists all HorariosExternos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HorariosExternosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HorariosExternos model.
     * @param integer $id_Hae
     * @param integer $id_Disciplina
     * @return mixed
     */
    public function actionView($id_Hae, $id_Disciplina)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_Hae, $id_Disciplina),
        ]);
    }

    /**
     * Creates a new HorariosExternos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HorariosExternos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_Hae' => $model->id_Hae, 'id_Disciplina' => $model->id_Disciplina]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HorariosExternos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_Hae
     * @param integer $id_Disciplina
     * @return mixed
     */
    public function actionUpdate($id_Hae, $id_Disciplina)
    {
        $model = $this->findModel($id_Hae, $id_Disciplina);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_Hae' => $model->id_Hae, 'id_Disciplina' => $model->id_Disciplina]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing HorariosExternos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_Hae
     * @param integer $id_Disciplina
     * @return mixed
     */
    public function actionDelete($id_Hae, $id_Disciplina)
    {
        $this->findModel($id_Hae, $id_Disciplina)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the HorariosExternos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_Hae
     * @param integer $id_Disciplina
     * @return HorariosExternos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_Hae, $id_Disciplina)
    {
        if (($model = HorariosExternos::findOne(['id_Hae' => $id_Hae, 'id_Disciplina' => $id_Disciplina])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
