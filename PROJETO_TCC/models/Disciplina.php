<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "disciplina".
 *
 * @property integer $id_Disciplina
 * @property string $nome
 * @property string $descricao
 * @property integer $externo
 *
 * @property CursoDisciplina[] $cursoDisciplinas
 * @property Curso[] $idCursos
 * @property CursoDisciplinaProfessor[] $cursoDisciplinaProfessors
 * @property Horariosexternos $externo0
 */
class Disciplina extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'disciplina';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'descricao'], 'required'],
            [['externo'], 'integer'],
            [['nome'], 'string', 'max' => 40],
            [['descricao'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_Disciplina' => Yii::t('app', 'ID  Disciplina'),
            'nome' => Yii::t('app', 'Nome'),
            'descricao' => Yii::t('app', 'Descrição'),
            'externo' => Yii::t('app', 'ID Horário Externo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursoDisciplinas()
    {
        return $this->hasMany(CursoDisciplina::className(), ['id_Disciplina' => 'id_Disciplina']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCursos()
    {
        return $this->hasMany(Curso::className(), ['id_Curso' => 'id_Curso'])->viaTable('curso_disciplina', ['id_Disciplina' => 'id_Disciplina']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursoDisciplinaProfessors()
    {
        return $this->hasMany(CursoDisciplinaProfessor::className(), ['id_Disciplina' => 'id_Disciplina']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExterno()
    {
        return $this->hasOne(Horariosexternos::className(), ['id_Hae' => 'externo']);
    }
}
