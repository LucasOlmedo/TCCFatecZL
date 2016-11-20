<?php

namespace app\controllers;

use app\models\Diasemana;
use app\models\GradeCurso;
use Yii;
use app\models\Aulasemestral;
use app\models\AulasemestralSearch;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AulasemestralController implements the CRUD actions for Aulasemestral model.
 */
class AulasemestralController extends Controller
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
     * Lists all Aulasemestral models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Aulasemestral();
        $searchModel = new AulasemestralSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }

    /**
     * Displays a single Aulasemestral model.
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
     * Creates a new Aulasemestral model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Aulasemestral();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['add-dia', 'id_aulasemestral' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Aulasemestral model.
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
     * Deletes an existing Aulasemestral model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (!Diasemana::find()->indexBy($id) == null) {
            Diasemana::deleteAll("id_Aulasemestral = " . $id);
        }
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Aulasemestral model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Aulasemestral the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Aulasemestral::findOne($id)) !== null) {
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

        if (count($rows) > 0) {
            foreach ($rows as $row) {
                echo "<option value='$row->id_Periodo'>" . $row->periodo->nome_periodo . "</option>";
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

        if (count($rows) > 0) {
            foreach ($rows as $row) {
                echo "<option value='$row->id_Disciplina'>" . $row->disciplina->nome_disc . "</option>";
            }
        }
    }

    public function actionAddDia($id_aulasemestral)
    {
        $model = $this->findModel($id_aulasemestral);
        return $this->render('add_dia',
            ['model' => $model, 'id_aulasemestral' => $id_aulasemestral]
        );
    }

    public function actionGravaDiasemana()
    {
        $id_aulasemestral = $_POST['id_aulasemestral'];
        $grade = Yii::$app->request->post('grade_dia');
        $grade_dia = explode(',', $grade);

        if (empty($grade)) {
            return $this->redirect(['index']);
        }
        for ($x = 0; $x < count($grade_dia); $x++) {
            if ($grade_dia[$x] != "") {
                $dia = explode("|", $grade_dia[$x]);
                $model = new Diasemana();
                $model->id_Aulasemestral = $id_aulasemestral;
                $model->dia_semana = $dia[0];
                $model->horario_inicio = $dia[1];
                $model->horario_fim = $dia[2];
                $model->save();
            }
        }
        return $this->redirect(['index']);
    }

    public function actionEditDia($id)
    {
        $query = new Query;
        $query->select(['diasemana.`id`,
                        diasemana.`id_Aulasemestral`,
                        diasemana.`dia_semana`,
                        diasemana.`horario_inicio`,
                        diasemana.`horario_fim`'])
            ->from('diasemana')
            ->where(['id_aulasemestral' => $id])
            ->orderBy('dia_semana');

        $command = $query->createCommand();
        $grade = $command->queryAll();

        $model = $this->findModel($id);

        return $this->render('edit_dia',
            [
                'model' => $model,
                'id_aulasemestral' => $id,
                'grade' => $grade
            ]
        );
    }

    /**
     * @return \yii\web\Response
     */
    public function actionAlteraDiasemana()
    {
        $id_aulasemestral = $_POST['id_aulasemestral'];
        $grade = Yii::$app->request->post('grade_dia');
        $grade_dia = explode(',', $grade);

        if (empty($grade)) {
            return $this->redirect(['index']);
        }

        $diasemanaExcluir = Yii::$app->request->post('excluir');

        if ($diasemanaExcluir != "") {
            foreach ($diasemanaExcluir as $id) {

                Diasemana::deleteAll(['id_Aulasemestral' => $id_aulasemestral, 'id' => $id]);
            }
        }

        if ($grade != "") {
            for ($x = 0; $x < count($grade_dia); $x++) {
                if ($grade_dia[$x] != "") {
                    $dia = explode("|", $grade_dia[$x]);
                    $model = new Diasemana();
                    $model->id_Aulasemestral = $id_aulasemestral;
                    $model->dia_semana = $dia[0];
                    $model->horario_inicio = $dia[1];
                    $model->horario_fim = $dia[2];
                    $model->save();
                }
            }
        }
        return $this->redirect(['index']);
    }
}
