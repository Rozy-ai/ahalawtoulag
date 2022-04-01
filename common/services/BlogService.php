<?php
namespace common\services;

use common\helpers\Text;
use eugenekei\news\models\News;
use common\helpers\Language;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;


class BlogService{

    public static function getBlogInfo($id){
        $query = News::find()->joinWith(['imageRelation','user'])->where(['news.slug' => $id])->one();

        if(isset($query))
            return $query;
        else
            throw new NotFoundHttpException(Yii::t('app', 'Can not find this news'));
    }

    public static function getLastBlogs($limit=null)
    {
        $query = News::find()->where(['news.status' => News::STATUS_ACTIVE, 'language'=>\Yii::$app->language])->orderBy(['created_at' => SORT_DESC]);

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

    public function count(){
        return News::find()->count();
    }

    public function getAllByRange($offset, $limit)
    {
        $query = News::find()->select(['slug','language'])->orderBy(['id' => SORT_ASC])->limit($limit)->offset($offset)->all();
        //Text::Pre($query);
        //echo $query->createCommand()->getRawSql();die;
        return $query;
    }

    public static function getSearchResults($title){
        $query = News::find()
            ->filterWhere(['like', 'title', $title])
            ->orWhere(['like', 'content', $title])
            ->groupBy('news.id')
            ->all();

        //echo $query->createCommand()->getRawSql();die;
        /*echo'<pre>';
        print_r($query);
        echo'</pre>';die;*/

        return $query;
    }
}
