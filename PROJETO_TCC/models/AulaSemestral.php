<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aulasemestral".
 *
 * @property integer $id_Curso
 * @property integer $id_Periodo
 * @property integer $id_Disciplina
 * @property integer $id_Professor
 * @property string $turno
 * @property string $data_inicio
 * @property string $data_fim
 *
 * @property Curso $idCurso
 * @property Disciplina $idDisciplina
 * @property Periodo $idPeriodo
 * @property Professor $idProfessor
 */
class AulaSemestral extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aulasemestral';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_Curso', 'id_Periodo', 'id_Disciplina', 'id_Professor', 'turno', 'data_inicio', 'data_fim'], 'required'],
            [['id_Curso', 'id_Periodo', 'id_Disciplina', 'id_Professor'], 'integer'],
            [['data_inicio', 'data_fim'], 'safe'],
            [['turno'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_Curso' => Yii::t('app', 'Id  Curso'),
            'id_Periodo' => Yii::t('app', 'Id  Periodo'),
            'id_Disciplina' => Yii::t('app', 'Id  Disciplina'),
            'id_Professor' => Yii::t('app', 'Id  Professor'),
            'turno' => Yii::t('app', 'Turno'),
            'data_inicio' => Yii::t('app', 'Data Inicio'),
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
    public function getIdPeriodo()
    {
        return $this->hasOne(Periodo::className(), ['id_Periodo' => 'id_Periodo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProfessor()
    {
        return $this->hasOne(Professor::className(), ['id_Professor' => 'id_Professor']);
    }
}
