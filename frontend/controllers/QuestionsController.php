<?php

namespace frontend\controllers;

use Yii;
use eugenekei\news\models\News;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\services\BlogService;

/**
 * BlogController implements the CRUD actions for Blog model.
 */
class QuestionsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Blog models.
     * @return mixed
     */
    public function actionIndex()
    {
        //$this->layout = "category-grid-full";
        $dataProvider = BlogService::getLastBlogs();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Blog model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($slug)
    {
        //$this->layout = "blog-details";
        //view counter
        if( isset($slug) && strlen($slug)>0 ){
            $model = BlogService::getBlogInfo($slug);
        }
        else
            throw new NotFoundHttpException(Yii::t('app', 'Can not find this blog'));

        return $this->render('view', [
            'model' => $model
        ]);
    }
}
