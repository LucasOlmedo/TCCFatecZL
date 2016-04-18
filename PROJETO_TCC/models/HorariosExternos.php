<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "horariosexternos".
 *
 * @property integer $id_Hae
 * @property integer $id_Disciplina
 * @property string $tipo
 *
 * @property Disciplina $idDisciplina
 */
class HorariosExternos extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'horariosexternos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_Hae', 'id_Disciplina', 'tipo'], 'required'],
            [['id_Hae', 'id_Disciplina'], 'integer'],
            [['tipo'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_Hae' => Yii::t('app', 'Id  Hae'),
            'id_Disciplina' => Yii::t('app', 'Id  Disciplina'),
            'tipo' => Yii::t('app', 'Tipo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDisciplina()
    {
        return $this->hasOne(Disciplina::className(), ['id_Disciplina' => 'id_Disciplina']);
    }
}
