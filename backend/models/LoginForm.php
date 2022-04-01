<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 10.04.2019
 * Time: 8:57
 */

namespace backend\models;

use common\helpers\Text;
use dektrium\user\models\LoginForm as BaseLogin;

class LoginForm extends BaseLogin
{
    /**
     * @var string
     */
    public $reCaptcha;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
//        $rules[] = ['reCaptcha', 'required'];
//        $rules[] = ['reCaptcha', \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => '6LfVxpwUAAAAAGJIxdE9PMcam53VyeoOVdxno8QA'];
        //Text::Pre($rules);
        return $rules;
    }
}