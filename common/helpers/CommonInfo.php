<?php
namespace common\helpers;
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 03.04.2018
 * Time: 14:06
 */
use yii\helpers\Json;

class CommonInfo
{
    public static function info($value) {

        if( !isset(\Yii::$app->session["settings"]) ){
            //load from db
            $settings = \backend\models\Settings::getSettings();
            $site = array();
            foreach($settings as $item) {
                $site[$item->mykey] = $item->value;
            }
            //save in session
            \Yii::$app->session["settings"] = $site;
        }
        else{
            //load from session
            $site = \Yii::$app->session["settings"];
        }

        //Text::Pre($site);

        /*$site = array();
        $site['phone'] = '+210 2234 546 78';
        $site['address'] = '1052 – 1054 Christchurch Road, Bournemouth, BH7 6DS';
        $site['email'] = 'support@diagram.com';
        $site['hours'] = '<p>Our support available to help you 25 hours a day, seven days a week.</p><p>Monday - Thursday @ 09.00 - 17.30</p><p>Friday &amp; Saturday @ 10.00 - 16.00</p><p>Sunday - <span> Closed </span></p>';
        $json_encoded = Json::encode($site);
        $json_decoded = Json::decode($json_encoded);*/
        if(!isset($site[$value]))
            $site[$value] = '&nbsp;';

        return $site[$value];
    }

    public static function infoCreate($key, $value) {
        if( isset(\Yii::$app->session["settings"]) ){
            $site = \Yii::$app->session["settings"];
            $site[$key] = $value;
            \Yii::$app->session["settings"] = $site;
        }
        else{
            $site = array();
            $site[$key] = $value;
            \Yii::$app->session["settings"] = $site;
        }
    }


    public static function infoUpdate($key, $value) {
        if( isset(\Yii::$app->session["settings"]) ){
            $site = \Yii::$app->session["settings"];
            if(isset($site[$key])){
                $site[$key] = $value;
                \Yii::$app->session["settings"] = $site;
            }
        }
    }

    public static function infoDelete($key) {
        if( isset(\Yii::$app->session["settings"]) ){
            $site = \Yii::$app->session["settings"];
            if(isset($site[$key])){
                unset($site[$key]);
                \Yii::$app->session["settings"] = $site;
            }
        }
    }

    public static function infoChangeLanguage() {
        //load from db with new language
        $settings = \backend\models\Settings::getSettings();
        $site = array();
        foreach($settings as $item) {
            $site[$item->mykey] = $item->value;
        }
        //save in session
        \Yii::$app->session["settings"] = $site;
    }
}
