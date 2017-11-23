<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SlideTranslation;

/**
 * SlideTranslationSearch represents the model behind the search form about `common\models\SlideTranslation`.
 */
class SlideTranslationSearch extends SlideTranslation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'slide_id', 'deleted'], 'integer'],
            [['language_id', 'title', 'description', 'anchor', 'url'], 'safe'],
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
        $query = SlideTranslation::find();

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
            'slide_id' => $this->slide_id,
            'deleted' => $this->deleted,
        ]);

        $query->andFilterWhere(['like', 'language_id', $this->language_id])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'anchor', $this->anchor])
            ->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}
