<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "periodo".
 *
 * @property integer $id_Periodo
 * @property string $nome_periodo
 *
 * @property Aulasemestral[] $aulasemestrals
 * @property GradeCurso[] $gradeCursos
 */
class Periodo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'periodo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_Periodo', 'nome_periodo'], 'required'],
            [['id_Periodo'], 'integer'],
            [['nome_periodo'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_Periodo' => 'ID',
            'nome_periodo' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAulasemestrals()
    {
        return $this->hasMany(Aulasemestral::className(), ['id_Periodo' => 'id_Periodo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGradeCursos()
    {
        return $this->hasMany(GradeCurso::className(), ['id_Periodo' => 'id_Periodo']);
    }
}
