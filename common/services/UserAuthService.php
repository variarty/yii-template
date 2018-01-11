<?php
namespace common\services;

/**
 * Auth user in system.
 * @author Artem Rasskosov
 */

use Yii;
use yii\web\User;
use yii\base\Security;
use common\entities\user\Identity;

use common\services\{
    dto\UserAuthDto,
    exceptions\WrongAuthDataException
};

class UserAuthService extends BaseService
{
    /**
     * @var Security $security
     */
    private $security;

    /**
     * @var User $user
     */
    private $user;

    /**
     * UserRegistrationService constructor.
     */
    public function __construct()
    {
        $this->user     = Yii::$app->user;
        $this->security = Yii::$app->security;
    }

    /**
     * @param UserAuthDto $dto
     * @return bool
     * @throws WrongAuthDataException
     */
    public function signIn(UserAuthDto $dto) :bool
    {
        if (!$user = $this->getUser($dto->login)) {
            throw new WrongAuthDataException();
        }

        if (!$this->validatePassword($dto->password, $user->getPassword())) {
            throw new WrongAuthDataException();
        }

        return $this->user->login($user, $this->user->absoluteAuthTimeout);
    }

    /**
     * @param string $signInPassword
     * @param string $userPasswordHash
     * @return bool
     */
    public function validatePassword($signInPassword, $userPasswordHash) :bool
    {
        $security = $this->security;

        return $security->validatePassword($signInPassword, $userPasswordHash);
    }

    /**
     * @param string $login
     * @return Identity
     */
    private function getUser($login)
    {
        static $user;

        return $user ?? $user = Identity::findIdentityByLogin($login);
    }
}