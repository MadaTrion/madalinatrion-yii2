<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "video_category_has_video".
 *
 * @property integer $video_category_id
 * @property integer $video_id
 *
 * @property Video $video
 * @property VideoCategory $videoCategory
 */
class VideoCategoryHasVideo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video_category_has_video';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['video_category_id', 'video_id'], 'required'],
            [['video_category_id', 'video_id'], 'integer'],
            [['video_id'], 'exist', 'skipOnError' => true, 'targetClass' => Video::className(), 'targetAttribute' => ['video_id' => 'id']],
            [['video_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => VideoCategory::className(), 'targetAttribute' => ['video_category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'video_category_id' => Yii::t('app', 'Video Category ID'),
            'video_id' => Yii::t('app', 'Video ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideo()
    {
        return $this->hasOne(Video::className(), ['id' => 'video_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideoCategory()
    {
        return $this->hasOne(VideoCategory::className(), ['id' => 'video_category_id']);
    }
}
