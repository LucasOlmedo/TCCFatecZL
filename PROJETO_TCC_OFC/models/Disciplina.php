<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "disciplina".
 *
 * @property integer $id_Disciplina
 * @property string $nome_disc
 * @property string $abreviacao
 * @property integer $externo
 *
 * @property Aulasemestral[] $aulasemestrals
 * @property Horariosexternos $externo0
 * @property GradeCurso[] $gradeCursos
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
            [['nome_disc', 'abreviacao'], 'required'],
            [['externo'], 'integer'],
            [['nome_disc'], 'string', 'max' => 40],
            [['abreviacao'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_Disciplina' => Yii::t('app', 'ID'),
            'nome_disc' => Yii::t('app', 'Nome da disciplina'),
            'abreviacao' => Yii::t('app', 'Abreviação'),
            'externo' => Yii::t('app', 'Tipo de horário'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAulasemestrals()
    {
        return $this->hasMany(Aulasemestral::className(), ['id_Disciplina' => 'id_Disciplina']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExterno0()
    {
        return $this->hasOne(Horariosexternos::className(), ['id_Hae' => 'externo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGradeCursos()
    {
        return $this->hasMany(GradeCurso::className(), ['id_Disciplina' => 'id_Disciplina']);
    }
}
