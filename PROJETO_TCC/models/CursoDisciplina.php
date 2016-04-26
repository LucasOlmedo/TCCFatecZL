<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "curso_disciplina".
 *
 * @property integer $id_Curso
 * @property integer $id_Disciplina
 * @property integer $qtde_aulas
 *
 * @property Curso $idCurso
 * @property Disciplina $idDisciplina
 */
class CursoDisciplina extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'curso_disciplina';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_Curso', 'id_Disciplina', 'qtde_aulas'], 'required'],
            [['id_Curso', 'id_Disciplina', 'qtde_aulas'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_Curso' => Yii::t('app', 'Id  Curso'),
            'id_Disciplina' => Yii::t('app', 'Id  Disciplina'),
            'qtde_aulas' => Yii::t('app', 'Quantidade de aulas'),
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
}
