<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "horariosexternos".
 *
 * @property integer $id_Hae
 * @property string $tipo
 *
 * @property Disciplina[] $disciplinas
 */
class HorariosExternos extends \yii\db\ActiveRecord
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
            [['id_Hae', 'tipo'], 'required'],
            [['id_Hae'], 'integer'],
            [['tipo'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_Hae' => 'Id  Hae',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinas()
    {
        return $this->hasMany(Disciplina::className(), ['externo' => 'id_Hae']);
    }
}
