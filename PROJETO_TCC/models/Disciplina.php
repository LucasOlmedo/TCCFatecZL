<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "disciplina".
 *
 * @property integer $id_Disciplina
 * @property string $nome
 * @property string $abreviacao
 * @property integer $externo
 *
 * @property Horariosexternos $externo0
 * @property GradeCurso[] $gradeCursos
 */
class Disciplina extends \yii\db\ActiveRecord
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
            [['nome', 'abreviacao'], 'required'],
            [['externo'], 'integer'],
            [['nome'], 'string', 'max' => 40],
            [['abreviacao'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_Disciplina' => Yii::t('app', 'Id  Disciplina'),
            'nome' => Yii::t('app', 'Nome'),
            'abreviacao' => Yii::t('app', 'Abreviacao'),
            'externo' => Yii::t('app', 'Externo'),
        ];
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
