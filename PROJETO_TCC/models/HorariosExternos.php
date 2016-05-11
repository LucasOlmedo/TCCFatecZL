<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "horariosexternos".
 *
 * @property integer $id_Hae
 * @property string $tipo
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
            [['tipo'], 'required'],
            [['tipo'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_Hae' => Yii::t('app', 'ID Horário Externo'),
            'tipo' => Yii::t('app', 'Tipo do horário externo'),
        ];
    }
}
