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
    public $message;
    public $honeypot;
    public $verifyCode;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        	// name, email, subject and body are required
            [['name', 'email', 'subject', 'message'], 'required'],
            // email has to be a valid email address
            ['email', 'email']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
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
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([$this->email => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->message)
            ->send();
    }

	/**
	 * Sends an email to the support.
	 *
	 * @return bool the result of the mailer operation
	 */
	public function contact()
	{
		// Validate the current model form
		if (!$this->validate()) {
			return false;
		}
		// Send email
		return Yii::$app
			->mailer
			->compose(
				['html' => 'contact-html', 'text' => 'contact-text'],
				['model' => $this]
			)
			->setFrom([$this->email => $this->name])
			->setTo(Yii::$app->params['settings']['contact']['email'])
			->setSubject($this->subject)
			->send();
	}
}
