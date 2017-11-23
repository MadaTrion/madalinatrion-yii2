<?php

namespace backend\controllers;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Booking;

/**
 * BookingSearch represents the model behind the search form about `common\models\Booking`.
 */
class BookingSearch extends Booking
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'event_type', 'nr_people', 'status', 'deleted'], 'integer'],
            [['last_name', 'first_name', 'location', 'event_date', 'team', 'specification'], 'safe'],
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
        $query = Booking::find();

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
            'event_type' => $this->event_type,
            'event_date' => $this->event_date,
            'nr_people' => $this->nr_people,
            'status' => $this->status,
            'deleted' => $this->deleted,
        ]);

        $query->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'team', $this->team])
            ->andFilterWhere(['like', 'specification', $this->specification]);

        return $dataProvider;
    }
}
