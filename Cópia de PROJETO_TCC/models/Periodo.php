<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "periodo".
 *
 * @property integer $id_Periodo
 * @property string $nome_periodo
 *
 * @property GradeCurso[] $gradeCursos
 */
class Periodo extends ActiveRecord
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
            [['nome_periodo'], 'required'],
            [['nome_periodo'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_Periodo' => Yii::t('app', 'Id  Periodo'),
            'nome_periodo' => Yii::t('app', 'Nome Periodo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGradeCursos()
    {
        return $this->hasMany(GradeCurso::className(), ['id_Periodo' => 'id_Periodo']);
    }
}
