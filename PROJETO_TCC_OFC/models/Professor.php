<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "professor".
 *
 * @property integer $id_Professor
 * @property string $nome
 * @property string $rg
 * @property string $categoria
 * @property string $graduacao
 * @property string $contrato
 * @property string $sede
 * @property string $inicio_cps
 * @property string $inicio_fateczl
 *
 * @property CursoDisciplinaProfessor[] $cursoDisciplinaProfessors
 * @property SituacaoProfessor[] $situacaoProfessors
 */
class Professor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'professor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'rg', 'categoria', 'graduacao', 'contrato', 'sede', 'inicio_cps', 'inicio_fateczl'], 'required'],
            [['inicio_cps', 'inicio_fateczl'], 'safe'],
            [['nome', 'categoria', 'graduacao', 'sede'], 'string', 'max' => 30],
            [['rg'], 'string', 'max' => 13],
            [['contrato'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_Professor' => Yii::t('app', 'ID'),
            'nome' => Yii::t('app', 'Nome do professor'),
            'rg' => Yii::t('app', 'RG'),
            'categoria' => Yii::t('app', 'Categoria'),
            'graduacao' => Yii::t('app', 'Graduação'),
            'contrato' => Yii::t('app', 'Contrato'),
            'sede' => Yii::t('app', 'Faculdade Sede'),
            'inicio_cps' => Yii::t('app', 'Início no Centro Paula Souza'),
            'inicio_fateczl' => Yii::t('app', 'Início na Fatec ZL'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursoDisciplinaProfessors()
    {
        return $this->hasMany(CursoDisciplinaProfessor::className(), ['id_Professor' => 'id_Professor']);
    }

    public function getSituacao()
    {
        return $this->hasMany(Situacao::className(), ['id_Situacao' => 'id_Situacao'])->viaTable('situacao_professor', ['id_Professor' => 'id_`Professor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSituacaoProfessors()
    {
        return $this->hasMany(SituacaoProfessor::className(), ['id_Professor' => 'id_Professor']);
    }
}
