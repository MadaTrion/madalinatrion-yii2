<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Video;

/**
 * VideoSearch represents the model behind the search form about `common\models\Video`.
 */
class VideoSearch extends Video
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'promotional', 'views', 'status', 'deleted'], 'integer'],
            [['thumbnaul', 'source', 'local_file', 'yotube_embed', 'vimeo_embed', 'embed_code', 'date_added'], 'safe'],
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
        $query = Video::find();

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
            'date_added' => $this->date_added,
            'promotional' => $this->promotional,
            'views' => $this->views,
            'status' => $this->status,
            'deleted' => $this->deleted,
        ]);

        $query->andFilterWhere(['like', 'thumbnaul', $this->thumbnaul])
            ->andFilterWhere(['like', 'source', $this->source])
            ->andFilterWhere(['like', 'local_file', $this->local_file])
            ->andFilterWhere(['like', 'yotube_embed', $this->yotube_embed])
            ->andFilterWhere(['like', 'vimeo_embed', $this->vimeo_embed])
            ->andFilterWhere(['like', 'embed_code', $this->embed_code]);

        return $dataProvider;
    }
}
