<?php
namespace common\services;

/**
 * Add new user.
 * @author Artem Rasskosov
 */

use Yii;

use common\services\dto\{
    UserAuthDto,
    UserRegistrationDto
};

use yii\base\Security;
use common\entities\user\User;

use common\repositories\UserRepositoryInterface;
use common\services\exceptions\UserAlreadyExistException;

class UserRegistrationService extends BaseService
{
    /**
     * @var UserAuthService $userAuthService
     */
    private $userAuthService;

    /**
     * @var Security $security
     */
    private $security;

    /**
     * @var UserRepositoryInterface $repository
     */
    private $repository;

    /**
     * UserRegistrationService constructor.
     * @param UserRepositoryInterface $repository
     * @param UserAuthService $userAuthService
     */
    public function __construct(
        UserRepositoryInterface $repository,
        UserAuthService $userAuthService
    ) {
        $this->repository       = $repository;
        $this->userAuthService  = $userAuthService;

        $this->security         = Yii::$app->security;
    }

    /**
     * @param UserRegistrationDto $dto
     * @param bool $auth
     * @return bool
     * @throws UserAlreadyExistException
     */
    public function signUp(UserRegistrationDto $dto, $auth = true): bool
    {
        if ($this->repository->isUserExist($dto->email)) {
            throw new UserAlreadyExistException();
        }

        $user = User::create(
            $dto->email,
            $this->getPasswordHash($dto->password),
            $this->getNewAuthKey()
        );

        $this->repository->save($user);

        return $auth ? $this->signIn($dto) : true;
    }

    /**
     * @param string $password
     * @return string
     */
    private function getPasswordHash($password)
    {
        return $this->security->generatePasswordHash($password);
    }

    /**
     * @return string
     */
    private function getNewAuthKey()
    {
        return $this->security->generateRandomString();
    }

    /**
     * @param UserRegistrationDto $registrationDto
     * @return bool
     */
    private function signIn(UserRegistrationDto $registrationDto): bool
    {
        $dto            = new UserAuthDto();
        $dto->login     = $registrationDto->email;
        $dto->password  = $registrationDto->password;

        return $this->userAuthService->signIn($dto);
    }
}