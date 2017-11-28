<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "slide".
 *
 * @property integer $id
 * @property string $image
 * @property integer $target_blank
 * @property integer $sort_order
 * @property integer $status
 * @property integer $deleted
 *
 * @property SlideTranslation[] $slideTranslations
 */
class Slide extends \yii\db\ActiveRecord
{
	const STATUS_INACTIVE = 0;
	const STATUS_ACTIVE = 1;

	const STATE_UNDELETED = 0;
	const STATE_DELETED = 1;

	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slide';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image'], 'required'],
            [['target_blank', 'sort_order', 'status', 'deleted'], 'integer'],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'image' => Yii::t('app', 'Image'),
            'target_blank' => Yii::t('app', 'Target Blank'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'status' => Yii::t('app', 'Status'),
            'deleted' => Yii::t('app', 'Deleted'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlideTranslations()
    {
        return $this->hasMany(SlideTranslation::className(), ['slide_id' => 'id']);
    }

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getSlideTranslation()
	{
		return $this->hasOne(SlideTranslation::className(), ['slide_id' => 'id'])->andWhere(['language_id' => Yii::$app->language]);
	}

	/**
	 * Find all slides
	 * @return array|\yii\db\ActiveRecord[]
	 */
	public static function findAllSlides()
	{
		return static::find()
			->alias('s')
			->select([
				's.id',
				's.status',
				's.image',
				's.target_blank',
				's.sort_order',
				'st.title',
				'st.description',
				'st.anchor',
				'st.url',
			])
			->joinWith('slideTranslation st')
			->where([
				's.deleted' => self::STATE_UNDELETED,
				'st.language_id' => Yii::$app->language
			])
			->orderBy(['s.sort_order' => SORT_ASC])
			->all();
	}
}
