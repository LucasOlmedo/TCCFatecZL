<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "situacao_professor".
 *
 * @property integer $id_SitProf
 * @property integer $id_Professor
 * @property integer $id_Situacao
 * @property string $data_sit
 *
 * @property Professor $idProfessor
 * @property Situacao $idSituacao
 */
class SituacaoProfessor extends \yii\db\ActiveRecord
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
            [['id_Professor', 'id_Situacao', 'data_sit'], 'required'],
            [['id_Professor', 'id_Situacao'], 'integer'],
            [['data_sit'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_SitProf' => Yii::t('app', 'ID'),
            'id_Professor' => Yii::t('app', 'ID do Professor'),
            'id_Situacao' => Yii::t('app', 'ID da Situação'),
            'data_sit' => Yii::t('app', 'Data da situação'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProfessor()
    {
        return $this->hasOne(Professor::className(), ['id_Professor' => 'id_Professor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSituacao()
    {
        return $this->hasOne(Situacao::className(), ['id_Situacao' => 'id_Situacao']);
    }
}
