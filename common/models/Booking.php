<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property integer $id
 * @property string $last_name
 * @property string $first_name
 * @property integer $event_type
 * @property string $location
 * @property string $event_date
 * @property integer $nr_people
 * @property string $team
 * @property string $specification
 * @property integer $status
 * @property integer $deleted
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'booking';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_type', 'nr_people', 'status', 'deleted'], 'integer'],
            [['event_date'], 'safe'],
            [['team', 'specification'], 'string'],
            [['last_name', 'first_name', 'location'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'last_name' => Yii::t('app', 'Last Name'),
            'first_name' => Yii::t('app', 'First Name'),
            'event_type' => Yii::t('app', 'Event Type'),
            'location' => Yii::t('app', 'Location'),
            'event_date' => Yii::t('app', 'Event Date'),
            'nr_people' => Yii::t('app', 'Nr People'),
            'team' => Yii::t('app', 'Team'),
            'specification' => Yii::t('app', 'Specification'),
            'status' => Yii::t('app', 'Status'),
            'deleted' => Yii::t('app', 'Deleted'),
        ];
    }
}
