<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diasemana".
 *
 * @property integer $id_diaSemana
 * @property integer $id_Professor
 * @property integer $id_Curso
 * @property integer $id_Disciplina
 * @property integer $id_Periodo
 * @property string $turno
 * @property string $horario_inicio
 * @property string $horario_fim
 *
 * @property Aulasemestral $idProfessor
 * @property Aulasemestral $idCurso
 * @property Aulasemestral $idDisciplina
 * @property Aulasemestral $idPeriodo
 * @property Aulasemestral $turno0
 */
class DiaSemana extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diasemana';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_diaSemana', 'id_Professor', 'id_Curso', 'id_Disciplina', 'id_Periodo', 'turno', 'horario_inicio', 'horario_fim'], 'required'],
            [['id_diaSemana', 'id_Professor', 'id_Curso', 'id_Disciplina', 'id_Periodo'], 'integer'],
            [['horario_inicio', 'horario_fim'], 'safe'],
            [['turno'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_diaSemana' => 'Id Dia Semana',
            'id_Professor' => 'Id  Professor',
            'id_Curso' => 'Id  Curso',
            'id_Disciplina' => 'Id  Disciplina',
            'id_Periodo' => 'Id  Periodo',
            'turno' => 'Turno',
            'horario_inicio' => 'Horario Inicio',
            'horario_fim' => 'Horario Fim',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProfessor()
    {
        return $this->hasOne(Aulasemestral::className(), ['id_Professor' => 'id_Professor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCurso()
    {
        return $this->hasOne(Aulasemestral::className(), ['id_Curso' => 'id_Curso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDisciplina()
    {
        return $this->hasOne(Aulasemestral::className(), ['id_Disciplina' => 'id_Disciplina']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPeriodo()
    {
        return $this->hasOne(Aulasemestral::className(), ['id_Periodo' => 'id_Periodo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurno0()
    {
        return $this->hasOne(Aulasemestral::className(), ['turno' => 'turno']);
    }
}
