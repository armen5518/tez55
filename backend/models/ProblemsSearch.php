<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Problems;

/**
 * ProblemsSearch represents the model behind the search form about `common\models\Problems`.
 */
class ProblemsSearch extends Problems
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['problems_id'], 'integer'],
            [['title', 'diagnose', 'status', 'date'], 'safe'],
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
        $query = Problems::find();

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
            'problems_id' => $this->problems_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'diagnose', $this->diagnose])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'date', $this->date]);
        if(!empty($params['id'])){
            $query
                ->where(['patients_problems.patient_id' => $params['id']])
                ->leftJoin('patients_problems', 'problems.problems_id = patients_problems.problem_id');
        }


        return $dataProvider;
    }
}
