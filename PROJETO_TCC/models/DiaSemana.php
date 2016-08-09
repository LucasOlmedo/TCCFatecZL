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
 * @property string $data_inicio
 * @property string $data_fim
 * @property string $horario_inicio
 * @property string $horario_fim
 *
 * @property Aulasemestral $idProfessor
 * @property Aulasemestral $idCurso
 * @property Aulasemestral $idDisciplina
 * @property Aulasemestral $idPeriodo
 * @property Aulasemestral $dataInicio
 * @property Aulasemestral $dataFim
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
            [['id_diaSemana', 'id_Professor', 'id_Curso', 'id_Disciplina', 'id_Periodo', 'data_inicio', 'data_fim', 'horario_inicio', 'horario_fim'], 'required'],
            [['id_diaSemana', 'id_Professor', 'id_Curso', 'id_Disciplina', 'id_Periodo'], 'integer'],
            [['data_inicio', 'data_fim', 'horario_inicio', 'horario_fim'], 'safe']
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
            'data_inicio' => 'Data Inicio',
            'data_fim' => 'Data Fim',
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
    public function getDataInicio()
    {
        return $this->hasOne(Aulasemestral::className(), ['data_inicio' => 'data_inicio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataFim()
    {
        return $this->hasOne(Aulasemestral::className(), ['data_fim' => 'data_fim']);
    }
}
