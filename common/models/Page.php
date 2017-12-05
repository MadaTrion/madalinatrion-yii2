<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $page_controller
 * @property string $page_action
 * @property integer $sort_order
 * @property string $position
 * @property integer $status
 * @property integer $deleted
 *
 * @property PageTranslation[] $pageTranslations
 */
class Page extends \yii\db\ActiveRecord
{
	const STATUS_INACTIVE = 0;
	const STATUS_ACTIVE = 1;

	const STATE_UNDELETED = 0;
	const STATE_DELETED = 1;

	const POSITION_HEADER = 1;
	const POSITION_HEADER_SECONDARY = 2;
	const POSITION_SIDEBAR = 3;
	const POSITION_FOOTER = 4;
	const POSITION_FOOTER_SECONDARY = 5;
	const POSITION_MOBILE = 6;

	public $title;
	public $keywords;
	public $description;
	public $slug;
	public $anchor;
	public $content;

	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'sort_order', 'status', 'deleted'], 'integer'],
            [['page_controller', 'page_action', 'position'], 'string', 'max' => 255],
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
            'page_controller' => Yii::t('app', 'Page Controller'),
            'page_action' => Yii::t('app', 'Page Action'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'position' => Yii::t('app', 'Position'),
            'status' => Yii::t('app', 'Status'),
            'deleted' => Yii::t('app', 'Deleted'),
        ];
    }

	//region RELATIONS
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageTranslations()
    {
        return $this->hasMany(PageTranslation::className(), ['page_id' => 'id']);
    }
	//endregion

	//region CUSTOM METHODS
	/**
	 * Find pages in a specific language
	 * @param $language_id
	 * @return array|\yii\db\ActiveRecord[]
	 */
	public function findPagesByLanguageId($language_id)
	{
		return self::find()
			->alias('p')
			->select([
				'p.id',
				'p.parent_id',
				'p.page_controller',
				'p.page_action',
				'p.position',
				'pt.title',
				'pt.keywords',
				'pt.description',
				'pt.content',
				'pt.slug',
				'pt.anchor',
			])
			->joinWith([
				'pageTranslations pt',
				'pageTranslations.language l'
			])
			->where([
				'p.deleted' => self::STATE_UNDELETED,
				'p.status' => self::STATUS_ACTIVE,
				'pt.language_id' => $language_id,
				'l.status' => Language::STATUS_ACTIVE,
			])
			->orderBy(['p.sort_order' => SORT_ASC])
			->all();
	}

	/**
	 * Find pages by position
	 * @param $position
	 * @return array|\yii\db\ActiveRecord[]
	 */
	public function findPagesByPosition($position)
	{
		return self::find()
			->alias('p')
			->select([
				'p.id',
				'p.parent_id',
				'p.page_controller',
				'p.page_action',
				'pt.title',
				'pt.slug',
				'pt.anchor',
			])
			->joinWith([
				'pageTranslations pt',
				'pageTranslations.language l'
			])
			->where([
				'p.deleted' => self::STATE_UNDELETED,
				'p.status' => self::STATUS_ACTIVE,
				'p.position' => $position,
				'pt.language_id' => Yii::$app->language,
				'l.status' => Language::STATUS_ACTIVE,
			])
			->orderBy(['p.sort_order' => SORT_ASC])
			->all();
	}

	/**
	 * Finds page metadata by controller and action ids
	 *
	 * @param $page_controller
	 * @param $page_action
	 * @param $slug
	 * @param $language_id
	 * @return \yii\db\ActiveRecord
	 */
	public function findPageMetadata($page_controller, $page_action, $slug, $language_id)
	{
		return self::find()
			->alias('p')
			->select([
				'p.id',
				'p.parent_id',
				'p.page_controller',
				'p.page_action',
				'pt.title',
				'pt.keywords',
				'pt.description',
				'pt.content',
				'pt.slug',
				'pt.anchor',
			])
			->joinWith([
				'pageTranslations pt',
				'pageTranslations.language l'
			], false)
			->where([
				'p.deleted' => self::STATE_UNDELETED,
				'p.status' => self::STATUS_ACTIVE,
				'p.page_controller' => $page_controller,
				'p.page_action' => $page_action,
				'pt.language_id' => $language_id,
				'pt.slug' => $slug,
				'l.status' => Language::STATUS_ACTIVE,
			])
			->limit(1)
			->one();
	}


	/**
	 * Find pages by parent
	 * @param $parent_id
	 * @param $position
	 * @return array|\yii\db\ActiveRecord[]
	 */
	public static function findPagesByParent($parent_id = null, $position = null)
	{
		return static::find()
			->alias('p')
			->select([
				'p.id',
				'p.parent_id',
				'p.page_controller',
				'p.page_action',
				'pt.title',
				'pt.slug',
				'pt.anchor',
			])
			->joinWith([
				'pageTranslations pt',
				'pageTranslations.language l'
			])
			->where([
				'p.deleted' => self::STATE_UNDELETED,
				'p.status' => self::STATUS_ACTIVE,
				'pt.language_id' => Yii::$app->language,
				'l.status' => Language::STATUS_ACTIVE,
			])
			->andFilterWhere([
				'p.parent_id' => $parent_id,
			])
			->andFilterWhere(['>', "FIND_IN_SET({$position}, p.position)", 0])
			->orderBy(['p.sort_order' => SORT_ASC])
			->all();
	}
	//endregion
}