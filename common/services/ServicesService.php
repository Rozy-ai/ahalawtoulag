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
use backend\models\Services;


class ServicesService
{

    public static function getAll()
    {
        $query = Services::find()->joinWith(['imageRelation']);
        $query->groupBy('services.id');
        $query->orderBy(['services.id' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 16,
            ],
        ]);

        return $dataProvider;
    }

    public static function getAllByCategory( $limit=null)
    {
        $query = Services::find()->joinWith(['imageRelation']);//'category',
        /*if($id != null)
            $query->andWhere('category_id= :id', [':id' => $id]);*/
        $query->groupBy('services.id');
        $query->orderBy(['id' => SORT_DESC]);

        //echo $query->createCommand()->getRawSql();die;

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

        return $dataProvider;
    }

    public static function getAllByRandom( $limit=null)
    {
        $query = Services::find()->joinWith(['imageRelation'])->where(['main_page'=>'1']);
        $query->groupBy('services.id');
        $query->orderBy(['main_page' => SORT_DESC]);
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

    public function count(){
        return Services::find()->andFilterWhere(['status'=>'1'])->count();
    }

    public function getAllByRange($offset, $limit)
    {
        $query = Services::find()
            ->andFilterWhere(['status'=>'1'])
            ->limit($limit)
            ->offset($offset)
            ->all();

        //Text::Pre($query);
        //echo $query->createCommand()->getRawSql();die;
        return $query;
    }
}