<?php
namespace common\services;

/**
 * @author Artem Rasskosov
 * @since 16.07.2017
 */

use Yii;
use common\entities\user\Identity;
use common\services\dto\UserAuthDto;
use common\services\exceptions\WrongAuthDataException;

class UserAuthService extends BaseService implements IUserAuthInterface
{
    /**
     * @inheritdoc
     */
    public function signIn(UserAuthDto $dto) :bool
    {
        if (!$user = $this->getUser($dto->login)) {
            throw new WrongAuthDataException();
        }

        if (!$this->validatePassword($dto->password, $user->getPassword())) {
            throw new WrongAuthDataException();
        }

        $yiiUser = Yii::$app->user;

        return $yiiUser->login($user, $yiiUser->absoluteAuthTimeout);
    }

    /**
     * @return bool
     */
    public function validatePassword($signInPassword, $userPasswordHash) :bool
    {
        $security = Yii::$app->getSecurity();

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