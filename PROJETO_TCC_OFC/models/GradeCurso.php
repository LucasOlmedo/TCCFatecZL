<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "grade_curso".
 *
 * @property integer $id_Curso
 * @property integer $id_Periodo
 * @property integer $id_Disciplina
 * @property integer $qtde_aulas
 *
 * @property Curso $idCurso
 * @property Disciplina $idDisciplina
 * @property Periodo $idPeriodo
 */
class GradeCurso extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grade_curso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_Curso', 'id_Periodo', 'id_Disciplina', 'qtde_aulas'], 'required'],
            [['id_Curso', 'id_Periodo', 'id_Disciplina', 'qtde_aulas'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_Curso' => 'ID do Curso',
            'id_Periodo' => 'Peíiodo',
            'id_Disciplina' => 'ID da Disciplina',
            'qtde_aulas' => 'Quantidade de Aulas',
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

    public function getDisciplina()
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

    public function getPeriodo()
    {
    return $this->hasOne(Periodo::className(), ['id_Periodo' => 'id_Periodo']);
    }
}
