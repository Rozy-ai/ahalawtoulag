<?php

namespace frontend\controllers;

use common\helpers\Language;
use common\helpers\Text;
use common\services\CompanyCategoryService;
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use backend\models\Services;
use backend\models\ServicesCategory;
use common\services\ServicesService;
use \yii\web\Response;
use frontend\models\InsuranceForm;

class ServicesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex($id=null)
    {
        $dataProvider = ServicesService::getAll();

        //gallery categories
        //$categories = CompanyCategoryService::getArray();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            //'categories' => $categories
        ]);
    }

    public function actionDetails($id)
    {
        $modelContact = new InsuranceForm();
        if ($modelContact->load(Yii::$app->request->post()) && $modelContact->validate()) {
            $status = 'error';
            $message = Yii::t('app','There was an error sending your message.');
            if ($modelContact->sendEmail(Yii::$app->params['infoEmail'])) {
                $status = 'success';
                $message = Yii::t('app','Thank you for contacting us. We will respond to you as soon as possible.');
            }

            \Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'status' => $status,
                'message' => $message,
            ];
        }
        else {
            $model = Services::find()->where(['services.id'=>$id])->joinWith(['imageRelation'])->one();
            $modelContact->subject = $model->title_ru;
            //$modelContact->email = $model->email;
            //$modelContact->title = Language::Current($model,'title');
            if ($model) {
                return $this->render('details', [
                    'model' => $model,
                    'modelContact' => $modelContact,
                ]);
            } else {
                throw new HttpException(404);
            }
        }
    }
}
