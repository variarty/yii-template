<?php
namespace common\services;

/**
 * Reset user password.
 * @author Artem Rasskosov
 */

use Yii;
use yii\base\Security;
use common\entities\user\User;

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
     * @var UserPasswordResetRequestService $service
     */
    private $service;

    /**
     * UserPasswordRecoveryService constructor.
     * @param UserPasswordResetRequestService $service
     */
    public function __construct(UserPasswordResetRequestService $service)
    {
        $this->service  = $service;
        $this->security = Yii::$app->security;
    }

    /**
     * @param UserPasswordResetDto $dto
     * @return User
     * @throws NotFound
     */
    public function resetPassword(UserPasswordResetDto $dto)
    {
        $userId = $this
            ->service
            ->getRequestInitiatorId($dto->token)
        ;

        if (!$user = User::findOne($userId)) {
            throw new NotFound();
        }

        $password = $this
            ->security
            ->generatePasswordHash($dto->password)
        ;

        $user->resetPassword($password);
        $user->save(false);

        return $user;
    }
}