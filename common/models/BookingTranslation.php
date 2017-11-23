<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "buisnes_transtation".
 *
 * @property integer $id
 * @property string $language_code
 * @property integer $business_id
 * @property string $buisnes_details
 * @property integer $deleted
 */
class BookingTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'buisnes_transtation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['business_id', 'deleted'], 'integer'],
            [['buisnes_details'], 'string'],
            [['language_code'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'language_code' => Yii::t('app', 'Language Code'),
            'business_id' => Yii::t('app', 'Business ID'),
            'buisnes_details' => Yii::t('app', 'Buisnes Details'),
            'deleted' => Yii::t('app', 'Deleted'),
        ];
    }
}
