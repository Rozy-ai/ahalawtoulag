<?php
namespace frontend\controllers\pages;

use common\services\ImageService;

use bupy7\pages\controllers\DefaultController as BaseDefaultController;
use frontend\models\InsuranceForm;

class DefaultController extends BaseDefaultController
{
    public function actionIndex($page)
    {
        $model = $this->findModel($page);
        $data['model'] = $model;

        if($page === 'partners'){
            $data['images'] = ImageService::getImages('Testimonial');
        }

        if($page === 'case-request'){
            $data['form'] = new InsuranceForm();
        }

        return $this->render('index', $data);
    }
}