<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PageTranslation;

/**
 * PageTranslationSearch represents the model behind the search form about `common\models\PageTranslation`.
 */
class PageTranslationSearch extends PageTranslation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'page_id', 'status', 'deleted'], 'integer'],
            [['language_id', 'title', 'keywords', 'description', 'content', 'slug', 'anchor'], 'safe'],
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
        $query = PageTranslation::find();

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
            'page_id' => $this->page_id,
            'status' => $this->status,
            'deleted' => $this->deleted,
        ]);

        $query->andFilterWhere(['like', 'language_id', $this->language_id])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'anchor', $this->anchor]);

        return $dataProvider;
    }
}
