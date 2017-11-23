<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "slide_translation".
 *
 * @property integer $id
 * @property integer $slide_id
 * @property string $language_id
 * @property string $title
 * @property string $description
 * @property string $anchor
 * @property string $url
 * @property integer $deleted
 *
 * @property Language $language
 * @property Slide $slide
 */
class SlideTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slide_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slide_id', 'language_id'], 'required'],
            [['slide_id', 'deleted'], 'integer'],
            [['description'], 'string'],
            [['language_id'], 'string', 'max' => 5],
            [['title', 'anchor', 'url'], 'string', 'max' => 255],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'language_id']],
            [['slide_id'], 'exist', 'skipOnError' => true, 'targetClass' => Slide::className(), 'targetAttribute' => ['slide_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'slide_id' => Yii::t('app', 'Slide ID'),
            'language_id' => Yii::t('app', 'Language ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'anchor' => Yii::t('app', 'Anchor'),
            'url' => Yii::t('app', 'Url'),
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
    public function getSlide()
    {
        return $this->hasOne(Slide::className(), ['id' => 'slide_id']);
    }
}
