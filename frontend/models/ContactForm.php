<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;
    public $title;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required','message'=>Yii::t('app','{attribute} cannot be blank.')],
            // email has to be a valid email address
            ['email', 'email','message'=>Yii::t('app','{attribute} is not a valid email address.')],
            // verifyCode needs to be entered correctly
            //['verifyCode', 'captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app','From'),
            'title' => Yii::t('app','To'),
            'subject' => Yii::t('app','Subject'),
            'email' => Yii::t('app','Email'),
            'body' => Yii::t('app','Message'),
            'verifyCode' => Yii::t('app','Verification Code'),
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
        $body = "";
        if(strlen($this->email)>3)
            $body .= "Email: ".$this->email."\n";

        $body .= $this->body;

        return Yii::$app->mailer->compose()
            ->setTo($email)
            //->setBcc(Yii::$app->params['adminEmail'])
            //->setFrom(['info@ah-insurance.com.tm'=>'Insurance'])
            ->setSubject($this->subject)
            ->setTextBody($body)
            ->send();
    }
}
