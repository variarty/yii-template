<?php
namespace common\services;

/**
 * Reset user password.
 * @author Artem Rasskosov
 */

use Yii;
use yii\base\Security;
use common\entities\user\User;

use common\repositories\{
    UserRepositoryInterface,
    exceptions\UserNotFoundException
};

use common\services\{
    dto\UserPasswordResetDto,
    exceptions\UserNotFoundException as NotFound
};

class UserPasswordResetService extends BaseService
{
    /**
     * @var Security $security
     */
    private $security;

    /**
     * @var UserRepositoryInterface $repository
     */
    private $repository;

    /**
     * @var UserPasswordResetRequestService $service
     */
    private $service;

    /**
     * UserPasswordRecoveryService constructor.
     * @param UserRepositoryInterface $repository
     * @param UserPasswordResetRequestService $service
     */
    public function __construct(UserRepositoryInterface $repository, UserPasswordResetRequestService $service)
    {
        $this->repository   = $repository;
        $this->service      = $service;

        $this->security     = Yii::$app->security;
    }

    /**
     * @param UserPasswordResetDto $dto
     * @return User
     * @throws NotFound
     */
    public function resetPassword(UserPasswordResetDto $dto)
    {
        try {
            $userId     = $this->service->getRequestInitiatorId($dto->token);
            $user       = $this->repository->find($userId);
            $password   = $this->security->generatePasswordHash($dto->password);

            $user->resetPassword($password);
            return $this->repository->save($user);
        } catch (UserNotFoundException $e) {
            throw new NotFound();
        }
    }
}