<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Disciplina;

/**
 * DisciplinaSearch represents the model behind the search form about `app\models\Disciplina`.
 */
class DisciplinaSearch extends Disciplina
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_Disciplina', 'externo'], 'integer'],
            [['nome_disc', 'abreviacao'], 'safe'],
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
        $query = Disciplina::find();

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
            'id_Disciplina' => $this->id_Disciplina,
            'externo' => $this->externo,
        ]);

        $query->andFilterWhere(['like', 'nome_disc', $this->nome_disc])
            ->andFilterWhere(['like', 'abreviacao', $this->abreviacao]);

        return $dataProvider;
    }
}
