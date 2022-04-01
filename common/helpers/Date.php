<?php
namespace common\helpers;
use Yii;
use yii\helpers\Html;

class Date{

    public static function FormatDate($date)
    {
        return date("d/m/Y", strtotime($date));
    }

    public static function RelativeTime($datetime) {
        if (!defined('SECOND'))
            define("SECOND", 1);
        if (!defined('MINUTE'))
            define("MINUTE", 60 * SECOND);
        if (!defined('HOUR'))
            define("HOUR", 60 * MINUTE);
        if (!defined('DAY'))
            define("DAY", 24 * HOUR);
        if (!defined('MONTH'))
            define("MONTH", 30 * DAY);

        $time = strtotime($datetime);

        $delta = time() - $time;

        if ($delta < 1 * MINUTE)
        {
            return $delta == 1 ? Yii::t('app', 'one second ago') : $delta . Yii::t('app', ' seconds ago');
        }
        if ($delta < 2 * MINUTE)
        {
            return Yii::t('app', 'a minute ago');
        }
        if ($delta < 45 * MINUTE)
        {
            return floor($delta / MINUTE) . Yii::t('app', ' minutes ago');
        }
        if ($delta < 90 * MINUTE)
        {
            return Yii::t('app', 'an hour ago');
        }
        if ($delta < 24 * HOUR)
        {
            return floor($delta / HOUR) . Yii::t('app', ' hours ago');
        }
        if ($delta < 48 * HOUR)
        {
            return Yii::t('app', 'yesterday');
        }
        if ($delta < 30 * DAY)
        {
            return floor($delta / DAY) . Yii::t('app', ' days ago');
        }
        if ($delta < 12 * MONTH)
        {
            $months = floor($delta / DAY / 30);
            return $months <= 1 ? Yii::t('app', 'one month ago') : $months . Yii::t('app', ' months ago');
        }
        else
        {
            $years = floor($delta / DAY / 365);
            return $years <= 1 ? Yii::t('app', 'one year ago') : $years . Yii::t('app', ' years ago');
        }
    }
}
