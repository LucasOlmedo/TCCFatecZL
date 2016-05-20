<?php

namespace app\controllers;

use app\models\CursoDisciplina;
use app\models\Disciplina;
use app\models\GradeCurso;
use app\models\Periodo;
use Yii;
use app\models\Curso;
use app\models\CursoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;

/**
 * CursoController implements the CRUD actions for Curso model.
 */
class CursoController extends Controller
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

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    /**
     * Lists all Curso models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CursoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Curso model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id)
        ]);
    }

    /**
     * Creates a new Curso model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Curso();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['add-disc', 'id' => $model->id_Curso]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Curso model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Curso model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (!GradeCurso::find()->indexBy($id) == null) {
            GradeCurso::deleteAll("id_Curso = " . $id);
        }
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Curso model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Curso the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Curso::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('A página solicitada não existe.');
        }
    }

    public function actionAddDisc($id)
    {
        $model = $this->findModel($id);
        $model_disc = Disciplina::find()->all();
        $model_per = Periodo::find()->all();
        return $this->render('add_disc',
            ['model' => $model, 'model_disc' => $model_disc, 'model_per' => $model_per, 'id_curso' => $model->id_Curso]
        );

    }

    public function actionGravaDisciplinas()
    {
        $id_curso = $_POST['id_curso'];
        $grade = Yii::$app->request->post('grade_curso');
        $grade_curso = explode(',', $grade);

        if (empty($grade)) {
            return $this->redirect(['index']);
        }
        for ($x = 0; $x < count($grade_curso); $x++) {
            if ($grade_curso[$x] != "") {
                $curso = explode("|", $grade_curso[$x]);
                $model = new GradeCurso();
                $model->id_Curso =      $id_curso;
                $model->ano_letivo =    $curso[0];
                $model->id_Periodo =    $curso[1];
                $model->id_Disciplina = $curso[2];
                $model->qtde_aulas =    $curso[3];
                $model->save();
            }
        }
        return $this->redirect(['index']);
    }

    public function actionEditDisc($id)
    {
        $query = new Query;
        $query->select(['grade_curso.`id_Curso`,
                        `grade_curso`.`id_Periodo`,
                        `disciplina`.`id_Disciplina`,
                        `grade_curso`.`ano_letivo`,
                        `disciplina`.`nome`,
                        `grade_curso`.`qtde_aulas`'])
            ->from('grade_curso')
            ->where(['grade_curso.id_Curso' => $id])
            ->join('INNER JOIN',
                'disciplina',
                'disciplina.id_Disciplina = grade_curso.id_Disciplina'
            );
        $command = $query->createCommand();
        $grade = $command->queryAll();

        $model = $this->findModel($id);
        $model_disc = Disciplina::find()->all();
        $model_per = Periodo::find()->all();
        return $this->render('edit_disc',
            [
                'model' => $model,
                'model_per' => $model_per,
                'model_disc' => $model_disc,
                'id_curso' => $model->id_Curso,
                'grade' => $grade
            ]
        );
        }

        public function actionAlteraDisciplinas()
    {
        $id_curso = $_POST['id_curso'];
        $grade = Yii::$app->request->post('grade_curso');
        $grade_curso = explode(',', $grade);

        if (empty($grade)) {
            return $this->redirect(['index']);
        }

        $disciplinasExcluir = Yii::$app->request->post('excluir');

        if ($disciplinasExcluir != "") {
            foreach ($disciplinasExcluir as $id) {
                GradeCurso::deleteAll(['id_Curso' => $id_curso, 'id_Disciplina' => $id]);
            }
        }

        if ($grade != "") {
            for ($x = 0; $x < count($grade_curso); $x++) {
                if ($grade_curso[$x] != "") {
                    $curso = explode("|", $grade_curso[$x]);
                    $model = new GradeCurso();
                    $model->id_Curso =      $id_curso;
                    $model->ano_letivo =    $curso[0];
                    $model->id_Periodo =    $curso[1];
                    $model->id_Disciplina = $curso[2];
                    $model->qtde_aulas =    $curso[3];
                    $model->save();
                }
            }
        }
        return $this->redirect(['index']);
    }
}
