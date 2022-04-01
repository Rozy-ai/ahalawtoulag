<?php
namespace common\services;

use dvizh\gallery\models\Image;
use yii\data\ActiveDataProvider;

class ImageService{

    public static function getMainImages($limit=null, $table=null){

        $where['isProduct']='1';
        if( !is_null($table) ){
            $where['modelName']=$table;
        }

        $query = Image::find()->where($where);
        //$query->groupBy('company.id');
        $query->orderBy(['isProduct' => SORT_DESC]);
        //$query->orderBy('RAND()');

        if($limit != null) {
            $query->limit($limit);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => array('pageSize' => 10),
        ]);

        if($limit != null) {
            $dataProvider->pagination = false;
        }

        //echo $query->createCommand()->getRawSql();die;

        return $dataProvider;
    }

    public static function getImages($modelName)
    {
        //$idArray = [1,2]
        $images = Image::find()->where(['modelName'=>$modelName])->asArray()->all();
        return $images;

    }
}
