<?php
namespace common\helpers;

use Yii;
use yii\db\Exception;
use yii\helpers\Html;

class Image{

    public static function getImageLink($model, $height = null, $link = null)
    {
        if( $link == null ) {
            $link = self::getUrl($model);

            if (isset($model)) {
                $link .= $model->filePath;
            }
        }

        $image = self::getImage($model, $height = null);
        return Html::a($image,$link);

    }

    public static function getImage($model, $height = null)
    {
        $url = self::getUrl($model);

        if(isset($model)){
            $url .= $model->filePath;

            if($height == null) {
                return Html::img($url,['class'=>'img-responsive']);//, 'style'=>'width: 100%'
            }
            else{
                return Html::img($url,['style'=>'height: '.$height]);
            }
        }
        else{
            $url .= "placeholder.png";
            return Html::img($url,['style' => 'height: '.$height]);
        }
    }

    public static function getUserImage($model, $height = null)
    {
        $url = self::getUrl($model);

        $url .= "user.png";
        return Html::img($url,['class'=>'media-object img-circle', 'alt'=>'Image User']);
    }

    public static function getUrl($model){
        $base = \Yii::$app->request->BaseUrl;
        $base = str_replace('/owner','',$base);
        $url = $base.'/images/store/';

        return $url;
    }

    public static function getFullUrl($model){

        $start = 'https://';
        if(MyUrl::isLocalhost()){
            $start = 'http://';
        }

        $url = $start.Yii::$app->getRequest()->serverName.''.self::getUrl($model);
        $url .= $model->filePath;

        return $url;
    }

    public static function Preview($model, $style=null){
        $url = self::getUrl($model);
        $url .= $model->filePath;

        return '<a href="'.$url.'" class="imgtype">'.Html::img($url, ['class'=>'img-responsive','style'=>$style]).'</a>';
    }
}
