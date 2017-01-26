<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PatientsProblems;

/**
 * PatientsProblemsSearch represents the model behind the search form about `common\models\PatientsProblems`.
 */
class PatientsProblemsSearch extends PatientsProblems
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'patient_id', 'problem_id'], 'integer'],
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
        $query = PatientsProblems::find();

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
            'id' => $this->id,
            'patient_id' => $this->patient_id,
            'problem_id' => $this->problem_id,
        ]);
        $query->leftJoin('problems','patients_problems.problem_id = problems.problems_id');

        return $dataProvider;
    }
}
