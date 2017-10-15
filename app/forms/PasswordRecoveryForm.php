<?php
namespace app\forms;

/**
 * Form for recovery user password.
 * @author Artem Rasskosov
 */

use Yii;
use yii\base\Model;
use common\services\dto\UserPasswordRecoveryDto;

class PasswordRecoveryForm extends Model
{
    /**
     * @var string $email
     */
    public $email;

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            ['email', 'required'],
            ['email', 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email' => Yii::t('app', 'Email'),
        ];
    }

    /**
     * @return UserPasswordRecoveryDto
     */
    public function getDto()
    {
        /** @var UserPasswordRecoveryDto $dto */
        $dto = Yii::configure(new UserPasswordRecoveryDto(), [
            'emailTo'   => $this->email,
            'emailFrom' => Yii::$app->params['emails.no-reply'],
            'subject'   => Yii::t('mail/subject', 'Password recovery'),
        ]);

        return $dto;
    }
}
