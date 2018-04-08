<?php
namespace app\forms;

/**
 * Form for change user password.
 * @author Artem Rasskosov
 */

use Yii;
use yii\base\Model;
use common\services\dto\UserPasswordResetDto;

class PasswordResetForm extends Model
{
    /**
     * @var string $password
     */
    public $password;

    /**
     * @var string $passwordRepeat
     */
    public $passwordRepeat;

    /**
     * @var string $token
     */
    public $token;

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 8],

            ['passwordRepeat', 'required'],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password', 'operator' => '===']
        ];
    }

    /**
     * @return UserPasswordResetDto
     */
    public function getDto(): UserPasswordResetDto
    {
        /** @var UserPasswordResetDto $dto */
        $dto = Yii::configure(new UserPasswordResetDto(), [
            'token'     => $this->token,
            'password'  => $this->password,
        ]);

        return $dto;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'password'          => Yii::t('form/label', 'New password'),
            'passwordRepeat'    => Yii::t('form/label', 'Repeat password'),
        ];
    }
}
