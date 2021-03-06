<?php

namespace app\models;


use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * AulasemestralSearch represents the model behind the search form about `app\models\Aulasemestral`.
 */
class AulasemestralSearch extends Aulasemestral
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_Curso', 'id_Periodo', 'id_Disciplina', 'id_Professor'], 'integer'],
            [['turno', 'data_inicio', 'data_fim'], 'safe'],
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
        $query = Aulasemestral::find();

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
            'id' => $this->id,
            'id_Curso' => $this->id_Curso,
            'id_Periodo' => $this->id_Periodo,
            'id_Disciplina' => $this->id_Disciplina,
            'id_Professor' => $this->id_Professor,
            'data_inicio' => $this->data_inicio,
            'data_fim' => $this->data_fim,
        ]);

        $query->andFilterWhere(['like', 'turno', $this->turno]);

        return $dataProvider;
    }
}
