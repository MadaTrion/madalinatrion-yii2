<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "video_category".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $sort_order
 * @property integer $category_status
 * @property integer $deleted
 *
 * @property VideoCategoryHasVideo[] $videoCategoryHasVideos
 * @property Video[] $videos
 * @property VideoCategoryTranslation[] $videoCategoryTranslations
 */
class VideoCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'sort_order', 'category_status', 'deleted'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'category_status' => Yii::t('app', 'Category Status'),
            'deleted' => Yii::t('app', 'Deleted'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideoCategoryHasVideos()
    {
        return $this->hasMany(VideoCategoryHasVideo::className(), ['video_category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideos()
    {
        return $this->hasMany(Video::className(), ['id' => 'video_id'])->viaTable('video_category_has_video', ['video_category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideoCategoryTranslations()
    {
        return $this->hasMany(VideoCategoryTranslation::className(), ['category_id' => 'id']);
    }
}
