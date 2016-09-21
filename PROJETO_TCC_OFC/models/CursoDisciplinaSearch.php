<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CursoDisciplina;

/**
 * CursoDisciplinaSearch represents the model behind the search form about `app\models\CursoDisciplina`.
 */
class CursoDisciplinaSearch extends CursoDisciplina
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_Curso', 'id_Disciplina', 'qtde_aulas'], 'integer'],
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
        $query = CursoDisciplina::find();

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
            'id_Disciplina' => $this->id_Disciplina,
            'qtde_aulas' => $this->qtde_aulas,
        ]);

        return $dataProvider;
    }
}
