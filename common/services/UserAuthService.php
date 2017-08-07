<?php
namespace common\services;

/**
 * @author Artem Rasskosov
 * @since 16.07.2017
 */

use Yii;
use yii\base\Security;
use common\entities\user\Identity;
use common\services\dto\UserAuthDto;
use common\services\exceptions\WrongAuthDataException;

class UserAuthService extends BaseService
{
    /**
     * @var Security $security
     */
    private $security;

    /**
     * UserRegistrationService constructor.
     * @param Security $security
     */
    public function __construct(Security $security)
    {
        $this->security = $security;
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

        $webUser = Yii::$app->user;

        return $webUser->login($user, $webUser->absoluteAuthTimeout);
    }

    /**
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