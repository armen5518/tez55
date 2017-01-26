<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Patients;

/**
 * FavoriteSearch represents the model behind the search form about `backend\models\Patients`.
 */
class FavoriteSearch extends Patients
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patients_id'], 'integer'],
            [['ealth_tatus', 'date', 'description'], 'safe'],
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
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
