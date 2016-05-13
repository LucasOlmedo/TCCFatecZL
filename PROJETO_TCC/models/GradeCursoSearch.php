<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GradeCurso;

/**
 * GradeCursoSearch represents the model behind the search form about `app\models\GradeCurso`.
 */
class GradeCursoSearch extends GradeCurso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_Curso', 'id_Periodo', 'id_Disciplina', 'ano_letivo', 'qtde_aulas'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = GradeCurso::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_Curso' => $this->id_Curso,
            'id_Periodo' => $this->id_Periodo,
            'id_Disciplina' => $this->id_Disciplina,
            'ano_letivo' => $this->ano_letivo,
            'qtde_aulas' => $this->qtde_aulas,
        ]);

        return $dataProvider;
    }
}
