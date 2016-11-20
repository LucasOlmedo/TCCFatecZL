<?php

namespace app\models;


use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * DiasemanaSearch represents the model behind the search form about `app\models\Diasemana`.
 */
class DiasemanaSearch extends Diasemana
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_Aulasemestral', 'dia_semana'], 'integer'],
            [['horario_inicio', 'horario_fim'], 'safe'],
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
        $query = Diasemana::find();

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
            'id_Aulasemestral' => $this->id_Aulasemestral,
            'dia_semana' => $this->dia_semana,
            'horario_inicio' => $this->horario_inicio,
            'horario_fim' => $this->horario_fim,
        ]);

        return $dataProvider;
    }
}
