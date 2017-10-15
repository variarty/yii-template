<?php
namespace common\services;

/**
 * Recovery user password.
 * @author Artem Rasskosov
 */

use Yii;
use yii\caching\Cache;
use yii\base\Security;
use yii\mail\MailerInterface;
use common\entities\user\User;
use common\repositories\UserRepository;
use common\services\dto\UserPasswordRecoveryDto;

class UserPasswordRecoveryService extends BaseService
{
    /**
     * @var Security $security
     */
    private $security;

    /**
     * @var MailerInterface $mailer
     */
    private $mailer;

    /**
     * @var Cache $cache
     */
    private $cache;

    /**
     * @var UserRepository $repository
     */
    private $repository;

    /**
     * UserPasswordRecoveryService constructor.
     * @param UserRepository $repository
     * @param Security $security
     * @param MailerInterface $mailer
     * @param Cache $cache
     */
    public function __construct(UserRepository $repository, Security $security, MailerInterface $mailer, Cache $cache)
    {
        $this->repository   = $repository;
        $this->security     = $security;
        $this->mailer       = $mailer;
        $this->cache        = $cache;
    }

    /**
     * @param UserPasswordRecoveryDto $dto
     * @return bool
     */
    public function sendEmail(UserPasswordRecoveryDto $dto): bool
    {
        $user   = $this->repository->findByEmail($dto->emailTo);
        $token  = $this->assignTokenWithUser($user);

        return $this->mailer
            ->compose('user/password-recovery', [
                'user'  => $user,
                'token' => $token,
            ])
            ->setTo($dto->emailTo)
            ->setFrom($dto->emailFrom)
            ->setSubject($dto->subject)
            ->send()
        ;
    }

    /**
     * @param string $token
     * @return bool
     */
    public function isEmailSent($token): bool
    {
        return $this->cache->exists($token);
    }

    /**
     * @param string $token
     * @param string $newPassword
     * @return bool
     */
    public function changePassword($token, $newPassword): bool
    {
        /** @var User $user */
        $user = $this->repository->find(
            $this->cache->get($token)
        );

        $newPassword = $this->security->generatePasswordHash($newPassword);

        $user->changePassword($newPassword);

        return $user->save();
    }

    /**
     * @param User $user
     * @return string
     */
    private function assignTokenWithUser(User $user): string
    {
        $token = $this->security->generateRandomString();
        $this->cache->add($token, $user->getId());

        return $token;
    }
}