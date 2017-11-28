<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\db\Expression;
use common\helpers\EntityHelper;
use yii\helpers\Url;
use yii\helpers\BaseInflector;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 *
 * @property AuthAssignment[] $authAssignments
 * @property Setting[] $settings
 */
class User extends ActiveRecord implements IdentityInterface
{
	const STATUS_DELETED = 0;
	const STATUS_ACTIVE = 1;

	const STATE_UNDELETED = 0;
	const STATE_DELETED = 1;

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return '{{%user}}';
	}

	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			[
				'class' => TimestampBehavior::className(),
				'createdAtAttribute' => 'created_at',
				'updatedAtAttribute' => 'updated_at',
				'value' => new Expression('NOW()'),
			]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['status', 'default', 'value' => self::STATUS_ACTIVE],
			['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
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
			'auth_key' => Yii::t('app', 'Auth Key'),
			'password_hash' => Yii::t('app', 'Password Hash'),
			'password_reset_token' => Yii::t('app', 'Password Reset Token'),
			'email' => Yii::t('app', 'Email'),
			'username' => Yii::t('app', 'Username'),
			'phone' => Yii::t('app', 'Phone'),
			'avatar' => Yii::t('app', 'Avatar'),
			'first_name' => Yii::t('app', 'First Name'),
			'middle_name' => Yii::t('app', 'Middle Name'),
			'last_name' => Yii::t('app', 'Last Name'),
			'gender' => Yii::t('app', 'Gender'),
			'created_at' => Yii::t('app', 'Created At'),
			'updated_at' => Yii::t('app', 'Updated At'),
			'status' => Yii::t('app', 'Status'),
			'deleted' => Yii::t('app', 'Deleted'),
		];
	}

	//region IDENTITY
	/**
	 * @inheritdoc
	 */
	public static function findIdentity($id)
	{
		return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
	}

	/**
	 * @inheritdoc
	 */
	public static function findIdentityByAccessToken($token, $type = null)
	{
		throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
	}

	/**
	 * Finds user by username
	 *
	 * @param string $username
	 * @return static|null
	 */
	public static function findByUsername($username)
	{
		return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
	}

	/**
	 * Finds user by password reset token
	 *
	 * @param string $token password reset token
	 * @return static|null
	 */
	public static function findByPasswordResetToken($token)
	{
		if (!static::isPasswordResetTokenValid($token)) {
			return null;
		}

		return static::findOne([
			'password_reset_token' => $token,
			'status' => self::STATUS_ACTIVE,
		]);
	}

	/**
	 * Finds out if password reset token is valid
	 *
	 * @param string $token password reset token
	 * @return bool
	 */
	public static function isPasswordResetTokenValid($token)
	{
		if (empty($token)) {
			return false;
		}

		$timestamp = (int) substr($token, strrpos($token, '_') + 1);
		$expire = Yii::$app->params['user.passwordResetTokenExpire'];
		return $timestamp + $expire >= time();
	}

	/**
	 * @inheritdoc
	 */
	public function getId()
	{
		return $this->getPrimaryKey();
	}

	/**
	 * @inheritdoc
	 */
	public function getAuthKey()
	{
		return $this->auth_key;
	}

	/**
	 * @inheritdoc
	 */
	public function validateAuthKey($authKey)
	{
		return $this->getAuthKey() === $authKey;
	}

	/**
	 * Validates password
	 *
	 * @param string $password password to validate
	 * @return bool if password provided is valid for current user
	 */
	public function validatePassword($password)
	{
		return Yii::$app->security->validatePassword($password, $this->password_hash);
	}

	/**
	 * Generates password hash from password and sets it to the model
	 *
	 * @param string $password
	 */
	public function setPassword($password)
	{
		$this->password_hash = Yii::$app->security->generatePasswordHash($password);
	}

	/**
	 * Generates "remember me" authentication key
	 */
	public function generateAuthKey()
	{
		$this->auth_key = Yii::$app->security->generateRandomString();
	}

	/**
	 * Generates new password reset token
	 */
	public function generatePasswordResetToken()
	{
		$this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
	}

	/**
	 * Removes password reset token
	 */
	public function removePasswordResetToken()
	{
		$this->password_reset_token = null;
	}
	//endregion

	//region RELATIONS
	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getAuthAssignments()
	{
		return $this->hasMany(AuthAssignment::className(), ['user_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getSettings()
	{
		return $this->hasMany(Setting::className(), ['user_id' => 'id']);
	}
	//endregion

	//region GETTERS and SETTERS
	/**
	 * Get the full name
	 *
	 * @return string
	 */
	public function getFullName()
	{
		return EntityHelper::getFullName($this);
	}

	/**
	 * Get the account name
	 *
	 * @return string
	 */
	public function getAccountName()
	{
		return $this->first_name . ' ' . mb_strtoupper($this->last_name[0]) . '.';
	}

	/**
	 * Get the profile ID as firstname-middlename-lastname-id
	 *
	 * @return string
	 */
	public function getProfileId()
	{
		return BaseInflector::slug($this->getFullName()) . '-' . $this->id;
	}

	/**
	 * Get the avatar path with fallback to blank image
	 *
	 * @return string
	 */
	public function getAvatarPath()
	{
		// Set avatar full path
		$avatar = Yii::getAlias('@uploads') . '/user/' . $this->id . '/' . $this->avatar;
		// Check if file exist on the server
		if (file_exists($avatar)) {
			$avatar = Url::home(true) . '/uploads/user/' . $this->id . '/' . $this->avatar;
		} else {
			$avatar = Yii::getAlias('@web') . '/img/blank-user-' . (($this->gender == 1) ? 'male' : 'female') . '.png';
		}
		// Return the avatar
		return $avatar;
	}
	//endregion

	//region AR
	/**
	 * Find User by its ID
	 * @param $id
	 * @return array|yii\db\ActiveRecord
	 */
	public function findUserById($id)
	{
		return self::find()
			->select([
				'id',
				'first_name',
				'middle_name',
				'last_name',
				'email',
				'phone',
				'status'
			])
			->where([
				'deleted' => self::STATE_UNDELETED,
				'status' => self::STATUS_ACTIVE,
				'id' => $id
			])
			->one();
	}
	//endregion
}