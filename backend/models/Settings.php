<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property string $mykey
 * @property string $value
 */
class Settings extends \yii\db\ActiveRecord
{
    const LANG_TM = 'tm';
    const LANG_RU = 'ru';
    const LANG_EN = 'en';
    const LANG_AR = 'ar';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings';
    }

    public static function getLanguageArray()
    {
        return [
            self::LANG_TM => Yii::t('app', 'TM'),
            self::LANG_RU => Yii::t('app', 'RU'),
            self::LANG_EN => Yii::t('app', 'EN'),
            self::LANG_AR => Yii::t('app', 'AR'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mykey', 'value'], 'required'],
            [['value'], 'string'],
            [['mykey'], 'string', 'max' => 25],
            [['language'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'mykey' => Yii::t('app', 'Key'),
            'value' => Yii::t('app', 'Value'),
            'language' => Yii::t('app', 'Language'),
        ];
    }

    public static function getSettings()
    {
        return Settings::find()->where(['language'=>\Yii::$app->language])->all();
    }
}
