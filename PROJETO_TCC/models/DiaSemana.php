<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "diasemana".
 *
 * @property integer $id_diaSemana
 * @property integer $id_Professor
 * @property integer $id_Curso
 * @property integer $id_Disciplina
 * @property integer $semestre
 * @property string $turno
 * @property string $horario
 *
 * @property CursoDisciplinaProfessor $idProfessor
 */
class DiaSemana extends ActiveRecord
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
            [['id_Professor', 'id_Curso', 'id_Disciplina', 'semestre', 'turno', 'horario'], 'required'],
            [['id_Professor', 'id_Curso', 'id_Disciplina', 'semestre'], 'integer'],
            [['horario'], 'safe'],
            [['turno'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_diaSemana' => Yii::t('app', 'Id Dia Semana'),
            'id_Professor' => Yii::t('app', 'Id  Professor'),
            'id_Curso' => Yii::t('app', 'Id  Curso'),
            'id_Disciplina' => Yii::t('app', 'Id  Disciplina'),
            'semestre' => Yii::t('app', 'Semestre'),
            'turno' => Yii::t('app', 'Turno'),
            'horario' => Yii::t('app', 'Horario'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProfessor()
    {
        return $this->hasOne(CursoDisciplinaProfessor::className(), ['id_Professor' => 'id_Professor', 'id_Curso' => 'id_Curso', 'id_Disciplina' => 'id_Disciplina', 'semestre' => 'semestre', 'turno' => 'turno']);
    }
}
