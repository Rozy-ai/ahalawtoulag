<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 06.08.2018
 * Time: 13:52
 */

namespace common\services;

use Yii;
use yii\data\ActiveDataProvider;
use backend\models\CompaniesCategory;
use common\helpers\Language;
use yii\helpers\ArrayHelper;


class CompanyCategoryService
{
    public static function getList()
    {
        return ArrayHelper::map(self::getArray(),'id', Language::CurrentTitle('title'));
    }

    public static function getArray()
    {
        return CompaniesCategory::find()->all();
    }
}