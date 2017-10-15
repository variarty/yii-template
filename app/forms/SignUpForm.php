<?php
namespace app\forms;

/**
 * Form for registration new user.
 * @author Artem Rasskosov
 */

use Yii;
use yii\base\Model;
use common\entities\user\User;
use common\services\dto\UserRegistrationDto;

class SignUpForm extends Model
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
     * @var string $passwordRepeat
     */
    public $passwordRepeat;

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 31],
            ['email', 'checkUnique'],

            ['password', 'required'],
            ['password', 'string', 'min' => 8],

            ['passwordRepeat', 'required'],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password', 'operator' => '===']
        ];
    }

    /**
     * @param string $attribute
     * @param array $params
     */
    public function checkUnique($attribute, $params)
    {
        if (null !== $user = User::findOne(['email' => $this->email])) {
            $this->addError('email', Yii::t('app/error', 'User already exist'));
        }
    }

    /**
     * @return UserRegistrationDto
     */
    public function getDto()
    {
        /** @var UserRegistrationDto $dto */
        $dto = Yii::configure(new UserRegistrationDto(), [
            'email'     => $this->email,
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
            'email'             => Yii::t('app', 'Email'),
            'password'          => Yii::t('app', 'Password'),
            'passwordRepeat'    => Yii::t('app', 'Repeat password'),
        ];
    }
}
