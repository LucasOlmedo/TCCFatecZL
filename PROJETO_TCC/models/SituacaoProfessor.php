<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "situacao_professor".
 *
 * @property integer $id_SitProf
 * @property integer $id_Professor
 * @property integer $id_Situacao
 * @property string $data
 */
class SituacaoProfessor extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'situacao_professor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_Professor', 'id_Situacao', 'data'], 'required'],
            [['id_Professor', 'id_Situacao'], 'integer'],
            [['data'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_SitProf' => Yii::t('app', 'Id  Sit Prof'),
            'id_Professor' => Yii::t('app', 'Id  Professor'),
            'id_Situacao' => Yii::t('app', 'Id  Situacao'),
            'data' => Yii::t('app', 'Data'),
        ];
    }
}
