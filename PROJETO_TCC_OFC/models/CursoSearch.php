<?php

namespace app\models;


use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * CursoSearch represents the model behind the search form about `app\models\Curso`.
 * @property mixed nome_curso
 */
class CursoSearch extends Curso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_Curso', 'carga_horaria'], 'integer'],
            [['nome_curso', 'abreviacao'], 'safe'],
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
        $query = Curso::find();

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
            'carga_horaria' => $this->carga_horaria,
        ]);

        $query->andFilterWhere(['like', 'nome_curso', $this->nome_curso])
            ->andFilterWhere(['like', 'abreviacao', $this->abreviacao]);

        return $dataProvider;
    }
}
