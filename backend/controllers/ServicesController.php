<?php

namespace backend\controllers;

use common\helpers\Text;
use common\services\ServicesService;
use Yii;
use backend\models\Services;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use bupy7\pages\Module;
use vova07\imperavi\actions\GetImagesAction;
use vova07\imperavi\actions\GetFilesAction;
use vova07\imperavi\actions\UploadFileAction;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ServicesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view','create','update','delete','images-get','image-upload','files-get','file-upload','image-delete','file-delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actions()
    {
        $myurl = Yii::$app->params['uploadUrl'];
        $mypath = Yii::$app->params['uploadParh'];

        //echo $myurl.'<br>'.$mypath;die;

        return [
            'images-get' => [
                'class' => 'vova07\imperavi\actions\GetImagesAction',
                'url' => $myurl.'images/', // Directory URL address, where files are stored.
                'path' => $mypath.'/images', // Or absolute path to directory where files are stored.
                'options' => ['only' => ['*.jpg', '*.jpeg', '*.png']], // These options are by default.
            ],
            'image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadFileAction',
                'url' => $myurl.'images/', // Directory URL address, where files are stored.
                'path' => $mypath.'/images', // Or absolute path to directory where files are stored.
            ],
            'image-delete' => [
                'class' => 'vova07\imperavi\actions\DeleteFileAction',
                'url' => $myurl.'images/', // Directory URL address, where files are stored.
                'path' => $mypath.'/images', // Or absolute path to directory where files are stored.
            ],
            'files-get' => [
                'class' => 'vova07\imperavi\actions\GetFilesAction',
                'url' => $myurl.'files/', // Directory URL address, where files are stored.
                'path' => $mypath.'/files', // Or absolute path to directory where files are stored.
                //'options' => ['only' => ['*.txt', '*.md']], // These options are by default.
            ],
            'file-upload' => [
                'class' => 'vova07\imperavi\actions\UploadFileAction',
                'url' => $myurl.'files/', // Directory URL address, where files are stored.
                'path' => $mypath.'/files', // Or absolute path to directory where files are stored.
                'uploadOnlyImage' => false, // For any kind of files uploading.
                'unique' => false,
                'replace' => true, //replace files with the same name
                'translit' => true, //translate filenames to translit
            ],
            'file-delete' => [
                'class' => 'vova07\imperavi\actions\DeleteFileAction',
                'url' => $myurl.'files/', // Directory URL address, where files are stored.
                'path' => $mypath.'/files', // Or absolute path to directory where files are stored.
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = ServicesService::getAll();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Services();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //Text::Pre(Yii::$app->request->post());
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Services the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Services::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
