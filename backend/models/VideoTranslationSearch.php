<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\VideoTranslation;

/**
 * VideoTranslationSearch represents the model behind the search form about `common\models\VideoTranslation`.
 */
class VideoTranslationSearch extends VideoTranslation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'video_id', 'deleted'], 'integer'],
            [['language_id', 'video_title', 'keywords', 'description'], 'safe'],
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
        $query = VideoTranslation::find();

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
            'video_id' => $this->video_id,
            'deleted' => $this->deleted,
        ]);

        $query->andFilterWhere(['like', 'language_id', $this->language_id])
            ->andFilterWhere(['like', 'video_title', $this->video_title])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
