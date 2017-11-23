<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "video".
 *
 * @property integer $id
 * @property string $thumbnaul
 * @property string $source
 * @property string $local_file
 * @property string $yotube_embed
 * @property string $vimeo_embed
 * @property string $embed_code
 * @property string $date_added
 * @property integer $promotional
 * @property integer $views
 * @property integer $status
 * @property integer $deleted
 *
 * @property VideoCategoryHasVideo[] $videoCategoryHasVideos
 * @property VideoCategory[] $videoCategories
 * @property VideoTranslation[] $videoTranslations
 * @property VideoView[] $videoViews
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_added'], 'safe'],
            [['promotional', 'views', 'status', 'deleted'], 'integer'],
            [['thumbnaul', 'source', 'local_file', 'yotube_embed', 'vimeo_embed', 'embed_code'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'thumbnaul' => Yii::t('app', 'Thumbnaul'),
            'source' => Yii::t('app', 'Source'),
            'local_file' => Yii::t('app', 'Local File'),
            'yotube_embed' => Yii::t('app', 'Yotube Embed'),
            'vimeo_embed' => Yii::t('app', 'Vimeo Embed'),
            'embed_code' => Yii::t('app', 'Embed Code'),
            'date_added' => Yii::t('app', 'Date Added'),
            'promotional' => Yii::t('app', 'Promotional'),
            'views' => Yii::t('app', 'Views'),
            'status' => Yii::t('app', 'Status'),
            'deleted' => Yii::t('app', 'Deleted'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideoCategoryHasVideos()
    {
        return $this->hasMany(VideoCategoryHasVideo::className(), ['video_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideoCategories()
    {
        return $this->hasMany(VideoCategory::className(), ['id' => 'video_category_id'])->viaTable('video_category_has_video', ['video_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideoTranslations()
    {
        return $this->hasMany(VideoTranslation::className(), ['video_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideoViews()
    {
        return $this->hasMany(VideoView::className(), ['video_id' => 'id']);
    }
}
