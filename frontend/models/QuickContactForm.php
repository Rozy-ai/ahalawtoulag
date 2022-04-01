<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class QuickContactForm extends Model
{
    public $name;
    public $phone;
    public $email;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email'], 'required','message'=>Yii::t('app','{attribute} cannot be blank.')],
            [['phone'], 'safe'],
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
            'name' => Yii::t('app','Name'),
            'phone' => Yii::t('app','Phone'),
            'email' => Yii::t('app','Email'),
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
        if(strlen($this->name)>0)
            $body .= "Ady: ".$this->name."\n";
        if(strlen($this->email)>3)
            $body .= "Emaýl: ".$this->email."\n";
        if(strlen($this->phone)>0)
            $body .= "Telefon: ".$this->phone."\n";

        return Yii::$app->mailer->compose()
            ->setTo($email)
            //->setBcc(Yii::$app->params['adminEmail'])
            //->setFrom([$this->email => $this->name])
            ->setSubject("industry.gov.tm")
            ->setTextBody($body)
            ->send();
    }
}
