<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Event;

/**
 * EventSearch represents the model behind the search form about `common\models\Event`.
 */
class EventSearch extends Event
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'allDay', 'ranges', 'editable'], 'integer'],
            [['title', 'description', 'start', 'end', 'dow', 'url', 'className', 'startEditable', 'durationEditable', 'source', 'color', 'backgroundColor', 'borderColor', 'textColor'], 'safe'],
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
        $query = Event::find();

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
            'allDay' => $this->allDay,
            'start' => $this->start,
            'end' => $this->end,
            'ranges' => $this->ranges,
            'editable' => $this->editable,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'dow', $this->dow])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'className', $this->className])
            ->andFilterWhere(['like', 'startEditable', $this->startEditable])
            ->andFilterWhere(['like', 'durationEditable', $this->durationEditable])
            ->andFilterWhere(['like', 'source', $this->source])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'backgroundColor', $this->backgroundColor])
            ->andFilterWhere(['like', 'borderColor', $this->borderColor])
            ->andFilterWhere(['like', 'textColor', $this->textColor]);

        return $dataProvider;
    }
}
