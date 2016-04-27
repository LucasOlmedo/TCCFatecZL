<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "curso".
 *
 * @property integer $id_Curso
 * @property string $nome
 * @property string $abreviacao
 * @property integer $carga_horaria
 *
 * @property CursoDisciplina[] $cursoDisciplinas
 * @property Disciplina[] $idDisciplinas
 * @property CursoDisciplinaProfessor[] $cursoDisciplinaProfessors
 */
class Curso extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'abreviacao', 'carga_horaria'], 'required'],
            [['carga_horaria'], 'integer'],
            [['nome'], 'string', 'max' => 40],
            [['abreviacao'], 'string', 'max' => 7]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_Curso' => Yii::t('app', 'ID'),
            'nome' => Yii::t('app', 'Curso'),
            'abreviacao' => Yii::t('app', 'Abreviação'),
            'carga_horaria' => Yii::t('app', 'Carga Horária'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursoDisciplinas()
    {
        return $this->hasMany(CursoDisciplina::className(), ['id_Curso' => 'id_Curso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDisciplinas()
    {
        return $this->hasMany(Disciplina::className(), ['id_Disciplina' => 'id_Disciplina'])->viaTable('curso_disciplina', ['id_Curso' => 'id_Curso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursoDisciplinaProfessor()
    {
        return $this->hasMany(CursoDisciplinaProfessor::className(), ['id_Curso' => 'id_Curso']);
    }
}
