<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Patients;

/**
 * PatientsSearch represents the model behind the search form about `common\models\Patients`.
 */
class PatientsSearch extends Patients
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patients_id'], 'integer'],
            [['ealth_tatus', 'date', 'description', 'p_name', 'p_last_name', 'date_birth', 'social_number'], 'safe'],
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
        $query = Patients::find();

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
            'patients_id' => $this->patients_id,
        ]);

        $query->andFilterWhere(['like', 'ealth_tatus', $this->ealth_tatus])
            ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'p_name', $this->p_name])
            ->andFilterWhere(['like', 'p_last_name', $this->p_last_name])
            ->andFilterWhere(['like', 'date_birth', $this->date_birth])
            ->andFilterWhere(['like', 'social_number', $this->social_number]);

        return $dataProvider;
    }
}
