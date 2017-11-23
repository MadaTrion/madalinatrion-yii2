<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "video_view".
 *
 * @property integer $id
 * @property integer $video_id
 * @property string $ip_address
 * @property string $access_date
 * @property integer $deleted
 *
 * @property Video $video
 */
class VideoView extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video_view';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['video_id'], 'required'],
            [['video_id', 'deleted'], 'integer'],
            [['access_date'], 'safe'],
            [['ip_address'], 'string', 'max' => 255],
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
            'ip_address' => Yii::t('app', 'Ip Address'),
            'access_date' => Yii::t('app', 'Access Date'),
            'deleted' => Yii::t('app', 'Deleted'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideo()
    {
        return $this->hasOne(Video::className(), ['id' => 'video_id']);
    }
}
