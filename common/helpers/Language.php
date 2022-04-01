<?php
namespace common\helpers;
use Yii;
use yii\helpers\Html;

class Language{

    const LANG_TM = 'tm';
    const LANG_RU = 'ru';
    const LANG_EN = 'en';
    const LANG_AR = 'ar';

    public static function getLanguageArray()
    {
        return [
            self::LANG_TM => Yii::t('app', 'TM'),
            self::LANG_RU => Yii::t('app', 'RU'),
           self::LANG_EN => Yii::t('app', 'EN'),
        ];
    }

    public static function Language(){
        return Yii::$app->language;
    }

    public static function getLanguageTitle($short)
    {
        //$title = $short;
        switch($short){
            case 'tm': $title = 'Türkmençe'; break;
            case 'ru': $title = 'Русский'; break;
            default: $title = 'English'; break;
        }
        return $title;
    }

    public static function Current($model, $title){
        // $title = $title.'_'.Yii::$app->language;
        return $model->$title;
    }

    public static function CurrentTitle($title){
        // $title = $title.'_'.Yii::$app->language;
        return $title;
    }


    public static function Change($language){

        if(in_array($language, array('ru','en','tm')) )
            \Yii::$app->language = $language;

        if(!\Yii::$app->language)
            \Yii::$app->language = Language::DefaultLanguage();

        \Yii::$app->session["lang"] = \Yii::$app->language;
    }

    public static function DefaultLanguage(){
        return 'tm';
    }
}
