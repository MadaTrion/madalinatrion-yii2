<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property string $language_id
 * @property string $language
 * @property string $country
 * @property string $name
 * @property string $name_ascii
 * @property integer $status
 *
 * @property AlbumImageTranslation[] $albumImageTranslations
 * @property AlbumTranslation[] $albumTranslations
 * @property AlbumVideoTranslation[] $albumVideoTranslations
 * @property ArticleCategoryTranslation[] $articleCategoryTranslations
 * @property ArticleTranslation[] $articleTranslations
 * @property ConferenceActivityTranslation[] $conferenceActivityTranslations
 * @property FeeTranslation[] $feeTranslations
 * @property LanguageTranslate[] $languageTranslates
 * @property LanguageSource[] $ids
 * @property LinkCategoryTranslation[] $linkCategoryTranslations
 * @property PageTranslation[] $pageTranslations
 * @property SlideTranslation[] $slideTranslations
 * @property SpeakerTranslation[] $speakerTranslations
 * @property SponsorTranslation[] $sponsorTranslations
 */
class Language extends \yii\db\ActiveRecord
{
	const STATUS_INACTIVE = 0;
	const STATUS_ACTIVE = 1;

	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id'], 'required'],
            [['status'], 'integer'],
            [['language_id'], 'string', 'max' => 5],
            [['language', 'country'], 'string', 'max' => 3],
            [['name', 'name_ascii'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'language_id' => Yii::t('app', 'Language ID'),
            'language' => Yii::t('app', 'Language'),
            'country' => Yii::t('app', 'Country'),
            'name' => Yii::t('app', 'Name'),
            'name_ascii' => Yii::t('app', 'Name Ascii'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

	//region RELATIONS
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbumImageTranslations()
    {
        return $this->hasMany(AlbumImageTranslation::className(), ['language_id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbumTranslations()
    {
        return $this->hasMany(AlbumTranslation::className(), ['language_id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbumVideoTranslations()
    {
        return $this->hasMany(AlbumVideoTranslation::className(), ['language_id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleCategoryTranslations()
    {
        return $this->hasMany(ArticleCategoryTranslation::className(), ['language_id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleTranslations()
    {
        return $this->hasMany(ArticleTranslation::className(), ['language_id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConferenceActivityTranslations()
    {
        return $this->hasMany(ConferenceActivityTranslation::className(), ['language_id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeeTranslations()
    {
        return $this->hasMany(FeeTranslation::className(), ['language_id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguageTranslates()
    {
        return $this->hasMany(LanguageTranslate::className(), ['language' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIds()
    {
        return $this->hasMany(LanguageSource::className(), ['id' => 'id'])->viaTable('language_translate', ['language' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinkCategoryTranslations()
    {
        return $this->hasMany(LinkCategoryTranslation::className(), ['language_id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageTranslations()
    {
        return $this->hasMany(PageTranslation::className(), ['language_id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlideTranslations()
    {
        return $this->hasMany(SlideTranslation::className(), ['language_id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpeakerTranslations()
    {
        return $this->hasMany(SpeakerTranslation::className(), ['language_id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSponsorTranslations()
    {
        return $this->hasMany(SponsorTranslation::className(), ['language_id' => 'language_id']);
    }
	//endregion

	//region CRUD
	/**
	 * Find all
	 * @return array|yii\db\ActiveRecord[]
	 */
	public function findAllLanguages()
	{
		return self::find()
			->select([
				'language_id',
				'name',
				'name_ascii',
				'status'
			])
			->all();
	}

	/**
	 * Find app languages
	 * @return array|yii\db\ActiveRecord[]
	 */
	public function findAppLanguages()
	{
		return self::find()
			->select([
				'language_id',
				'name',
				'name_ascii',
				'status'
			])
			->where([
				'status' => self::STATUS_ACTIVE
			])
			->all();
	}
	//endregion
}
