<?php
namespace frontend\controllers;

use common\helpers\Language;
use common\helpers\Text;
use common\models\User;
use common\services\ImageService;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\QuickContactForm;
use frontend\models\ContactForm;
use common\services\BlogService;
use common\services\PageService;
use common\helpers\CommonInfo;
use yii\data\ActiveDataProvider;
use backend\models\Services;
use common\services\ServicesService;
use \yii\web\Response;
use frontend\models\SearchForm;

/**
 * Site controller
 */
class SiteController extends Controller
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
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {


        //$about = PageService::getFirstParagraph(4);
        $blogs = BlogService::getLastBlogs(8);

        $sliders = \backend\models\Slider::getSlickSliders();
        //catalog
        //$randomProducts = ImageService::getMainImages(4,'Companies');
        $recentServices = ServicesService::getAllByCategory(6);
        //$recentTenders = CompaniesService::getAllByCategory(4);

        $contact = new QuickContactForm();

        if ($contact->load(Yii::$app->request->post()) && $contact->validate()) {
            $status = 'error';
            $message = Yii::t('app','There was an error sending your message.');
            if ($contact->sendEmail(Yii::$app->params['infoEmail'])) {
                $status = 'success';
                $message = Yii::t('app','Thank you for contacting us. We will respond to you as soon as possible.');
            }

            \Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'status' => $status,
                'message' => $message,

            ];
        }

        $clients = ImageService::getImages('Testimonial');

        $partners = CommonInfo::info('partners');

        return $this->render('index',[
            //'about' => $about,
            'blogs' => $blogs,
            'sliders' => $sliders,
            'recentServices' => $recentServices,
            'contact' => $contact,
            'recentQuestions' => $blogs,
            'clients' => $clients,
            'partners' => $partners,
            'model' => $contact,
        ]);
    }

    public function actionSearch()
    {
        $model = new SearchForm();
        if ($model->load(Yii::$app->request->get()) && $model->validate()) {
            $companies = Services::getSearchResults($model->title);
            $tenders = BlogService::getSearchResults($model->title);
        }
        return $this->render('search',[
            'tenders' => $tenders,
            'companies' => $companies,
            'model' => $model,
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new QuickContactForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $status = 'error';
            $message = Yii::t('app','There was an error sending your message.');
            if ($model->sendEmail(Yii::$app->params['infoEmail'])) {
                $status = 'success';
                $message = Yii::t('app','Thank you for contacting us. We will respond to you as soon as possible.');
                //Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } /*else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }*/

            \Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'status' => $status,
                'message' => $message,
            ];

            //return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionLanguage()
    {
        $request = Yii::$app->request;

        if(in_array($request->get('language'), array('tm','ru','en', 'ar')) )
            \Yii::$app->language = $request->get('language');

        if(!\Yii::$app->language)
            \Yii::$app->language = Language::DefaultLanguage();

        \Yii::$app->session["lang"] = \Yii::$app->language;

        //update settings session
        CommonInfo::infoChangeLanguage();

        return $this->redirect(['site/index']);
    }
}
