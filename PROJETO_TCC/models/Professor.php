<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

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
 */
class Professor extends ActiveRecord
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
            'id_Professor' => Yii::t('app', 'Id  Professor'),
            'nome' => Yii::t('app', 'Nome'),
            'rg' => Yii::t('app', 'Rg'),
            'categoria' => Yii::t('app', 'Categoria'),
            'graduacao' => Yii::t('app', 'Graduacao'),
            'contrato' => Yii::t('app', 'Contrato'),
            'sede' => Yii::t('app', 'Sede'),
            'inicio_cps' => Yii::t('app', 'Inicio Cps'),
            'inicio_fateczl' => Yii::t('app', 'Inicio Fateczl'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursoDisciplinaProfessors()
    {
        return $this->hasMany(CursoDisciplinaProfessor::className(), ['id_Professor' => 'id_Professor']);
    }
}
