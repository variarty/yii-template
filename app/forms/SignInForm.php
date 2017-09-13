<?php
namespace app\forms;

/**
 * Form for login user.
 * @author Artem Rasskosov
 */

use Yii;
use yii\base\Model;
use common\services\dto\UserAuthDto;

class SignInForm extends Model
{
    /**
     * @var string $email
     */
    public $email;

    /**
     * @var string $password
     */
    public $password;

    /**
     * @var bool $rememberMe
     */
    public $rememberMe;

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 31],

            ['password', 'required'],
            ['password', 'string', 'min' => 8],

            ['rememberMe', 'default', 'value' => 1],
        ];
    }

    /**
     * @return UserAuthDto
     */
    public function getDto()
    {
        /** @var UserAuthDto $dto */
        $dto = Yii::configure(new UserAuthDto(), [
            'login'         => $this->email,
            'password'      => $this->password,
            'rememberMe'    => $this->rememberMe,
        ]);

        return $dto;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email'     => Yii::t('app', 'Email'),
            'password'  => Yii::t('app', 'Password'),
        ];
    }
}
