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
 *
 * @property CursoDisciplina[] $cursoDisciplinas
 * @property Curso[] $idCursos
 * @property CursoDisciplinaProfessor[] $cursoDisciplinaProfessors
 * @property Horariosexternos[] $horariosexternos
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
            'id_Disciplina' => Yii::t('app', 'ID'),
            'nome' => Yii::t('app', 'Disciplina'),
            'descricao' => Yii::t('app', 'Descrição'),
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
    public function getHorariosexternos()
    {
        return $this->hasMany(Horariosexternos::className(), ['id_Disciplina' => 'id_Disciplina']);
    }
}
