<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "video_category_translation".
 *
 * @property integer $id
 * @property string $language_id
 * @property integer $category_id
 * @property string $language_code
 * @property string $category_name
 * @property string $category_meta_keywords
 * @property string $category_meta_description
 * @property integer $deleted
 *
 * @property Language $language
 * @property VideoCategory $category
 */
class VideoCategoryTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video_category_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id', 'category_id'], 'required'],
            [['category_id', 'deleted'], 'integer'],
            [['language_id'], 'string', 'max' => 5],
            [['language_code', 'category_name', 'category_meta_keywords', 'category_meta_description'], 'string', 'max' => 255],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'language_id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => VideoCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'language_id' => Yii::t('app', 'Language ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'language_code' => Yii::t('app', 'Language Code'),
            'category_name' => Yii::t('app', 'Category Name'),
            'category_meta_keywords' => Yii::t('app', 'Category Meta Keywords'),
            'category_meta_description' => Yii::t('app', 'Category Meta Description'),
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
    public function getCategory()
    {
        return $this->hasOne(VideoCategory::className(), ['id' => 'category_id']);
    }
}
