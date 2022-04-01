<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "testimonial".
 *
 * @property int $id
 * @property string $text
 */
class Testimonial extends \yii\db\ActiveRecord
{
    const LANG_TM = 'tm';
    const LANG_RU = 'ru';
    const LANG_EN = 'en';
    const LANG_TR = 'tr';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'testimonial';
    }

    public static function getLanguageArray()
    {
        return [
            self::LANG_TM => Yii::t('app', 'TM'),
            self::LANG_RU => Yii::t('app', 'RU'),
            self::LANG_EN => Yii::t('app', 'EN'),
            self::LANG_TR => Yii::t('app', 'TR')
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
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
            'text' => Yii::t('app', 'Text'),
            'language' => Yii::t('app', 'Language'),
        ];
    }
	
	/**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
			'images' => [
                'class' => 'dvizh\gallery\behaviors\AttachImages',
                'mode' => 'gallery',
                'quality' => 100,
                'galleryId' => 'testimonial'
            ],
        ];
    }

    public static function getTestimonials()
    {
        return Testimonial::find()->where(['language'=>\Yii::$app->language])->one();
    }
}
