<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProblemRetrieval;

/**
 * ProblemRetrievalSearch represents the model behind the search form about `common\models\ProblemRetrieval`.
 */
class ProblemRetrievalSearch extends ProblemRetrieval
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['problem_retrieval_id', 'problem_id'], 'integer'],
            [['Symptoms', 'Initial_diagnose', 'main_diagnose', 'Secondary_diagnoses', 'Status'], 'safe'],
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
        $query = ProblemRetrieval::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'problem_retrieval_id' => $this->problem_retrieval_id,
            'problem_id' => $this->problem_id,
        ]);

        $query->andFilterWhere(['like', 'Symptoms', $this->Symptoms])
            ->andFilterWhere(['like', 'Initial_diagnose', $this->Initial_diagnose])
            ->andFilterWhere(['like', 'main_diagnose', $this->main_diagnose])
            ->andFilterWhere(['like', 'Secondary_diagnoses', $this->Secondary_diagnoses])
            ->andFilterWhere(['like', 'Status', $this->Status]);

        return $dataProvider;
    }
}
