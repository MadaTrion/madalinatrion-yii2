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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageTranslations()
    {
        return $this->hasMany(PageTranslation::className(), ['page_id' => 'id']);
    }
}
