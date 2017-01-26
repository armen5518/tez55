<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ConditionRetrieval;

/**
 * ConditionRetrievalSearch represents the model behind the search form about `common\models\ConditionRetrieval`.
 */
class ConditionRetrievalSearch extends ConditionRetrieval
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['condition_retrieval_id', 'conditions_id'], 'integer'],
            [['Symptoms', 'Potential_diagnose', 'Status', 'Last_Update_Date'], 'safe'],
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
        $query = ConditionRetrieval::find();

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
            'condition_retrieval_id' => $this->condition_retrieval_id,
            'conditions_id' => $this->conditions_id,
        ]);

        $query->andFilterWhere(['like', 'Symptoms', $this->Symptoms])
            ->andFilterWhere(['like', 'Potential_diagnose', $this->Potential_diagnose])
            ->andFilterWhere(['like', 'Status', $this->Status])
            ->andFilterWhere(['like', 'Last_Update_Date', $this->Last_Update_Date]);

        return $dataProvider;
    }
}
