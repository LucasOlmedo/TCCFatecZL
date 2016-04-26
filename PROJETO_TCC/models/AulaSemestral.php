<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "curso_disciplina_professor".
 *
 * @property integer $id_Professor
 * @property integer $id_Curso
 * @property integer $id_Disciplina
 * @property integer $semestre
 * @property string $turno
 * @property string $data_inicio
 * @property string $data_fim
 *
 * @property Curso $idCurso
 * @property Disciplina $idDisciplina
 * @property Professor $idProfessor
 * @property Diasemana[] $diasemanas
 */
class AulaSemestral extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'curso_disciplina_professor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_Professor', 'id_Curso', 'id_Disciplina', 'semestre', 'turno', 'data_inicio', 'data_fim'], 'required'],
            [['id_Professor', 'id_Curso', 'id_Disciplina', 'semestre'], 'integer'],
            [['data_inicio', 'data_fim'], 'safe'],
            [['turno'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_Professor' => Yii::t('app', 'ID  Professor'),
            'id_Curso' => Yii::t('app', 'ID  Curso'),
            'id_Disciplina' => Yii::t('app', 'ID  Disciplina'),
            'semestre' => Yii::t('app', 'Semestre'),
            'turno' => Yii::t('app', 'Turno'),
            'data_inicio' => Yii::t('app', 'Data Início'),
            'data_fim' => Yii::t('app', 'Data Fim'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCurso()
    {
        return $this->hasOne(Curso::className(), ['id_Curso' => 'id_Curso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDisciplina()
    {
        return $this->hasOne(Disciplina::className(), ['id_Disciplina' => 'id_Disciplina']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProfessor()
    {
        return $this->hasOne(Professor::className(), ['id_Professor' => 'id_Professor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiasemanas()
    {
        return $this->hasMany(Diasemana::className(), ['id_Professor' => 'id_Professor', 'id_Curso' => 'id_Curso', 'id_Disciplina' => 'id_Disciplina', 'semestre' => 'semestre', 'turno' => 'turno']);
    }
}
