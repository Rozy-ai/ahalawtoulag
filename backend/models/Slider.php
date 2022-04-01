<?php

namespace backend\models;

use Yii;
use dvizh\gallery\models\Image;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string $text
 */
class Slider extends \yii\db\ActiveRecord
{
    const LANG_TM = 'tm';
    const LANG_RU = 'ru';
    const LANG_EN = 'en';
    const LANG_TR = 'tr';

    const SCREEN_FULL = "1";
    const SCREEN_MOBILE = "2";
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slider';
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

    public static function getScreenArray()
    {
        return [
            self::SCREEN_FULL => Yii::t('app', 'Full Screen'),
            self::SCREEN_MOBILE => Yii::t('app', 'Mobile Screen'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['language','type','link'], 'safe'],
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
            'type' => Yii::t('app', 'Category'),
            'link' => Yii::t('app', 'Link'),
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
                'mode' => 'single',
                'quality' => 100,
                'galleryId' => 'slider'
            ],
        ];
    }

    public static function getSliders($type=null)
    {
        if($type==null)
            $type = 1;
        return Slider::find()->where(['language'=>\Yii::$app->language, 'type'=>$type])->all();//->where(['language'=>\Yii::$app->language])
    }

    public function getImageRelation()
    {
        return $this->hasOne(Image::className(), ['itemId' => 'id'])->andOnCondition(['modelName' => 'Slider']);
    }

    public static function getSlickSliders($type=null)
    {
        if($type==null)
            $type = 1;
        return Slider::find()->joinWith(['imageRelation'])->where(['language'=>\Yii::$app->language, 'type'=>$type])->asArray()->all();
    }
}
