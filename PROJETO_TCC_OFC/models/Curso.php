<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "Curso".
 *
 * @property integer $id_Curso
 * @property string $nome_curso
 * @property string $abreviacao
 * @property integer $carga_horaria
 */
class Curso extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Curso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome_curso', 'abreviacao', 'carga_horaria'], 'required'],
            [['carga_horaria'], 'integer'],
            [['nome_curso'], 'string', 'max' => 40],
            [['abreviacao'], 'string', 'max' => 7]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_Curso' => Yii::t('app', 'ID'),
            'nome_curso' => Yii::t('app', 'Nome'),
            'abreviacao' => Yii::t('app', 'Abreviação'),
            'carga_horaria' => Yii::t('app', 'Carga Horária'),
        ];
    }
}
