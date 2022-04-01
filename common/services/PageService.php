<?php
namespace common\services;

use bupy7\pages\models\Page;
use common\helpers\Language;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use common\helpers\Text;

class PageService{

    public static function Menu($alias){
        $query = Page::find()->select(['title','content','alias','language'])->where(['alias'=>$alias,'published' => Page::PUBLISHED_YES])->orderBy(['id' => SORT_ASC])->one();
        //echo $query->createCommand()->getRawSql();die;
        //Text::Pre($query);

        if(isset($query))
            return $query;
        else
            throw new NotFoundHttpException(Yii::t('app', 'Can not find this menu'));
    }

    public static function getAll()
    {
        return Page::find()->andWhere(['=', 'published', Page::PUBLISHED_YES])->asArray()->all();
    }

    public static function getFirstParagraph($sentence){
        $page = self::Menu();
        $title = $content = $slug = $language = '';

        if(isset($page)){
            $title = $page->title;
            $contentList = Text::stripTags($page->content);
            $contentList = explode('.', $contentList);
            $slug = $page->alias;
            $language = $page->language;
        }

        for($i=0; $i<$sentence; $i++){
            $content .= $contentList[$i].'. ';
        }

        return ['title' =>$title, 'content' =>$content, 'slug'=>$slug, 'language'=>$language];
    }
}
