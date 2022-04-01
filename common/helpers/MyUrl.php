<?php
namespace common\helpers;
use Yii;
use yii\helpers\Html;

class MyUrl{

    public static function ServerName()
    {
        $url = '';
        if(self::isLocalhost())
            $url = '';

        return 'http://'.Yii::$app->getRequest()->serverName.$url;
    }

    public static function Current()
    {
        return self::ServerName().Yii::$app->request->url;
    }


    public static function Category($slug, $language=null)
    {
        return ['organization/index', 'language'=>is_null($language) ? Language::Language():$language,'category'=>$slug];
    }

    public static function Services($id, $language=null)
    {
        return ['/services/details','id'=>$id, 'language'=>is_null($language) ? Language::Language():$language];
    }

    public static function Blog($slug, $language=null)
    {
        return ['/questions/view','language'=>is_null($language) ? Language::Language():$language,'slug'=>$slug];
    }

    public static function Pages($slug, $language)
    {
        return ['/pages/default/index', 'language'=>is_null($language) ? Language::Language():$language, 'page'=>$slug];
    }

    public static function isLocalhost($whitelist = ['127.0.0.1', '::1']) {
        return in_array($_SERVER['REMOTE_ADDR'], $whitelist);
    }
}
