<?php

namespace frontend\controllers;

use common\services\PageService;
use bupy7\pages\models\Page;
use common\services\ServicesService;
use backend\models\Services;

use common\services\sitemap\IndexItem;
use common\services\sitemap\MapItem;
use common\services\sitemap\Sitemap;
use yii\caching\Dependency;
use yii\caching\TagDependency;
use yii\helpers\Url;
use yii\web\Controller;
use common\helpers\MyUrl;
use common\services\BlogService;
use eugenekei\news\models\News;
//use yii\web\Response;

class SitemapController extends Controller
{
    const ITEMS_PER_PAGE = 100;
    const ONE_WEEK = 604800;

    private $sitemap;
    private $pages;
    private $questions;
    private $services;
    //private $langArray;

    public function __construct(
        $id,
        $module,
        Sitemap $sitemap,
        PageService $pages,
        BlogService $questions,
        ServicesService $services,
        $config = []
    )
    {
        parent::__construct($id, $module, $config);
        $this->sitemap = $sitemap;
        $this->pages = $pages;
        $this->questions = $questions;
        $this->services = $services;
        //$this->langArray = Language::getLanguageArray();
    }

    public function actionIndex()
    {
        return $this->renderSitemap('sitemap-index', function () {
            return $this->sitemap->generateIndex([
                new IndexItem(Url::to(['pages'], true)),
                new IndexItem(Url::to(['site-questions-index'], true)),
                new IndexItem(Url::to(['site-services-index', 'language'=>'en'], true)),
                new IndexItem(Url::to(['site-services-index', 'language'=>'tm'], true)),
                new IndexItem(Url::to(['site-services-index', 'language'=>'ru'], true)),
            ]);
        });
    }

    public function actionPages()
    {
        return $this->renderSitemap('sitemap-pages', function () {
            return $this->sitemap->generateMap(array_map(function (Page $model) {
                return new MapItem(
                    Url::to(MyUrl::Pages($model->alias, $model->language), true),
                    strtotime($model->updated_at),
                    MapItem::WEEKLY
                );
            }, $this->pages->getAll()));
        });
    }

    public function actionSiteQuestionsIndex()
    {
        return $this->renderSitemap('sitemap-site-questions-index', function (){
            return $this->sitemap->generateIndex(array_map(function ($start) {
                return new IndexItem(Url::to(['site-questions', 'start' => $start * self::ITEMS_PER_PAGE], true));
            }, range(0, (int)($this->questions->count() / self::ITEMS_PER_PAGE))));
        });
    }

    public function actionSiteQuestions($start = 0)
    {
        return $this->renderSitemap(['sitemap-site-questions', $start], function () use ($start) {
            return $this->sitemap->generateMap(array_map(function (News $post) {
                return new MapItem(
                    Url::to(MyUrl::Blog($post->slug,$post->language), true),
                    $post->updated_at,
                    MapItem::DAILY
                );
            }, $this->questions->getAllByRange($start, self::ITEMS_PER_PAGE)));
        });
    }

    public function actionSiteServicesIndex($language)
    {
        return $this->renderSitemap(['sitemap-site-services-index',$language], function () use($language){
            return $this->sitemap->generateIndex(array_map(function ($start) use($language) {
                return new IndexItem(Url::to(['site-services', 'language'=>$language, 'start' => $start * self::ITEMS_PER_PAGE], true));
            }, range(0, (int)($this->services->count() / self::ITEMS_PER_PAGE))));
        }, new TagDependency(['tags' => ['services']]));
    }

    public function actionSiteServices($language, $start = 0)
    {
        return $this->renderSitemap(['sitemap-site-services', $language, $start], function () use ($language, $start) {
            return $this->sitemap->generateMap(array_map(function (Services $model) use($language) {
                return new MapItem(
                    Url::to(MyUrl::Services($model->id,$language), true),
                    null,
                    MapItem::DAILY
                );
            }, $this->services->getAllByRange($start, self::ITEMS_PER_PAGE)));
        }, new TagDependency(['tags' => ['services']]));
    }
    

    private function renderSitemap($key, callable $callback, Dependency $dependency = null)
    {
        //\Yii::$app->cache->delete($key);
        return \Yii::$app->response->sendContentAsFile(\Yii::$app->cache->getOrSet($key, $callback, self::ONE_WEEK, $dependency), Url::canonical(), [
            'mimeType' => 'application/xml',
            'inline' => true
        ]);
    }
}