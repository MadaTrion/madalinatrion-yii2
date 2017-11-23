<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "video_translation".
 *
 * @property integer $id
 * @property integer $video_id
 * @property string $language_id
 * @property string $video_title
 * @property string $keywords
 * @property string $description
 * @property integer $deleted
 *
 * @property Language $language
 * @property Video $video
 */
class VideoTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['video_id', 'language_id'], 'required'],
            [['video_id', 'deleted'], 'integer'],
            [['language_id'], 'string', 'max' => 5],
            [['video_title', 'keywords', 'description'], 'string', 'max' => 255],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'language_id']],
            [['video_id'], 'exist', 'skipOnError' => true, 'targetClass' => Video::className(), 'targetAttribute' => ['video_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'video_id' => Yii::t('app', 'Video ID'),
            'language_id' => Yii::t('app', 'Language ID'),
            'video_title' => Yii::t('app', 'Video Title'),
            'keywords' => Yii::t('app', 'Keywords'),
            'description' => Yii::t('app', 'Description'),
            'deleted' => Yii::t('app', 'Deleted'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['language_id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideo()
    {
        return $this->hasOne(Video::className(), ['id' => 'video_id']);
    }
}
