<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DiaSemana;

/**
 * DiaSemanaSearch represents the model behind the search form about `app\models\DiaSemana`.
 */
class DiaSemanaSearch extends DiaSemana
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_diaSemana', 'id_Professor', 'id_Curso', 'id_Disciplina', 'id_Periodo'], 'integer'],
            [['data_inicio', 'data_fim', 'horario_inicio', 'horario_fim'], 'safe'],
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
        $query = DiaSemana::find();

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
            'id_diaSemana' => $this->id_diaSemana,
            'id_Professor' => $this->id_Professor,
            'id_Curso' => $this->id_Curso,
            'id_Disciplina' => $this->id_Disciplina,
            'id_Periodo' => $this->id_Periodo,
            'data_inicio' => $this->data_inicio,
            'data_fim' => $this->data_fim,
            'horario_inicio' => $this->horario_inicio,
            'horario_fim' => $this->horario_fim,
        ]);

        return $dataProvider;
    }
}
