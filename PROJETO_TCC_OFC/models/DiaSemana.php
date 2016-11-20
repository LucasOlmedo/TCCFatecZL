<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "diasemana".
 *
 * @property integer $id
 * @property integer $id_Aulasemestral
 * @property integer $dia_semana
 * @property string $horario_inicio
 * @property string $horario_fim
 *
 * @property Aulasemestral $idAulasemestral
 */
class Diasemana extends ActiveRecord
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
            [['id_Aulasemestral', 'dia_semana', 'horario_inicio', 'horario_fim'], 'required'],
            [['id_Aulasemestral', 'dia_semana'], 'integer'],
            [['horario_inicio', 'horario_fim'], 'safe'],
            [['id_Aulasemestral', 'dia_semana', 'horario_inicio', 'horario_fim'], 'unique', 'targetAttribute' => ['id_Aulasemestral', 'dia_semana', 'horario_inicio', 'horario_fim'], 'message' => 'The combination of Id  Aulasemestral, Dia Semana, Horario Inicio and Horario Fim has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_Aulasemestral' => 'Id  Aulasemestral',
            'dia_semana' => 'Dia da Semana',
            'horario_inicio' => 'Horario Inicial Aula',
            'horario_fim' => 'Horario Final Aula',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAulasemestral()
    {
        return $this->hasOne(Aulasemestral::className(), ['id' => 'id_aulasemestral']);
    }
}
