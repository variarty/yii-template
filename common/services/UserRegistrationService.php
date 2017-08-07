<?php
namespace common\services;

/**
 * @author Artem Rasskosov
 * @since 07.08.2017
 */

use yii\base\Security;
use common\entities\user\User;
use common\services\dto\UserAuthDto;
use common\services\dto\UserRegistrationDto;

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
     * UserRegistrationService constructor.
     * @param UserAuthService $userAuthService
     * @param Security $security
     */
    public function __construct(UserAuthService $userAuthService, Security $security)
    {
        $this->userAuthService  = $userAuthService;
        $this->security         = $security;
    }

    /**
     * @param UserRegistrationDto $dto
     * @param bool $auth
     * @return bool
     */
    public function signUp(UserRegistrationDto $dto, $auth = true): bool
    {
        $entity = User::create(
            $dto->email,
            $this->security->generatePasswordHash($dto->password),
            $this->security->generateRandomString()
        );

        $entity->save();

        return $auth ? $this->signIn($dto) : true;
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