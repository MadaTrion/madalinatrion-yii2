<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\VideoCategoryTranslation;

/**
 * VideoCategoryTranslationSearch represents the model behind the search form about `common\models\VideoCategoryTranslation`.
 */
class VideoCategoryTranslationSearch extends VideoCategoryTranslation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'deleted'], 'integer'],
            [['language_id', 'language_code', 'category_name', 'category_meta_keywords', 'category_meta_description'], 'safe'],
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
        $query = VideoCategoryTranslation::find();

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
            'category_id' => $this->category_id,
            'deleted' => $this->deleted,
        ]);

        $query->andFilterWhere(['like', 'language_id', $this->language_id])
            ->andFilterWhere(['like', 'language_code', $this->language_code])
            ->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'category_meta_keywords', $this->category_meta_keywords])
            ->andFilterWhere(['like', 'category_meta_description', $this->category_meta_description]);

        return $dataProvider;
    }
}
