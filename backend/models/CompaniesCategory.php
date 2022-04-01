<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "galereya".
 *
 * @property int $id
 * @property string $title_tm
 * @property int $title_ru
 * @property int $title_en
 * @property string $status
 */
class CompaniesCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title_tm', 'title_ru', 'title_en', 'title_ar'], 'required'],
            [['status'], 'string'],
            [['title_tm','title_ru', 'title_en', 'title_ar'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title_tm' => Yii::t('app', 'Title').' TM',
            'title_ru' => Yii::t('app', 'Title').' RU',
            'title_en' => Yii::t('app', 'Title').' EN',
            'title_ar' => Yii::t('app', 'Title').' AR',
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
