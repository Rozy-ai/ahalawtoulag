<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class InsuranceForm extends Model
{
    public $name;
    public $email;
    public $phone;
    public $city;
    public $organization;
    public $subject;
    public $body;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'phone', 'body'], 'required','message'=>Yii::t('app','{attribute} cannot be blank.')],
            [['subject'], 'safe'],
            // email has to be a valid email address
            ['email', 'email','message'=>Yii::t('app','{attribute} is not a valid email address.')],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app','From'),
            'phone' => Yii::t('app','Phone'),
            'city' => Yii::t('app','City'),
            'organization' => Yii::t('app','Organization'),
            'subject' => Yii::t('app','Subject'),
            'email' => Yii::t('app','Email'),
            'body' => Yii::t('app','Message'),
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

        $body .= Yii::t('app','From').': '.$this->name."\n";
        $body .= Yii::t('app','Phone').': '.$this->phone."\n";
        //$body .= Yii::t('app','City').': '.$this->city."\n";
        $body .= Yii::t('app','Message').': '.$this->body."\n";

        return Yii::$app->mailer->compose()
            ->setTo($email)
            //->setBcc(Yii::$app->params['adminEmail'])
            //->setFrom(['info@ah-insurance.com.tm'=>'Insurance'])
            ->setSubject($this->subject)
            ->setTextBody($body)
            ->send();
    }
}
