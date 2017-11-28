<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "setting".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $type
 * @property string $setting
 * @property string $date_added
 * @property integer $status
 * @property integer $deleted
 *
 * @property User $user
 */
class Setting extends \yii\db\ActiveRecord
{
	const STATE_UNDELETED = 0;
	const STATE_DELETED = 1;

	const STATUS_INACTIVE = 0;
	const STATUS_ACTIVE = 1;

	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'setting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'status', 'deleted'], 'integer'],
            [['setting'], 'required'],
            [['setting'], 'string'],
            [['date_added'], 'safe'],
            [['name', 'type'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'name' => Yii::t('app', 'Name'),
            'type' => Yii::t('app', 'Type'),
            'setting' => Yii::t('app', 'Setting'),
            'date_added' => Yii::t('app', 'Date Added'),
            'status' => Yii::t('app', 'Status'),
            'deleted' => Yii::t('app', 'Deleted'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

	/**
	 * Finds site settings.
	 *
	 * @return mixed|null
	 */
	public static function findSiteSettings()
	{
		// Find site settings
		$siteSettings = static::findOne([
			'deleted' => self::STATE_UNDELETED,
			'type' => 'setting',
			'name' => 'site',
		]);
		// Return unserialized result if exist
		if ($siteSettings && $siteSettings->setting) {
			return unserialize($siteSettings->setting);
		}
		// Return null if there are no site settings
		return null;
	}
}
