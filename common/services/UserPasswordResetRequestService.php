<?php
namespace common\services;

/**
 * Recovery user password.
 * @author Artem Rasskosov
 */

use Yii;

use yii\{
    caching\Cache,
    base\Security,
    mail\MailerInterface
};

use common\services\exceptions\{
    UnknownErrorException,
    UserNotFoundException as NotFound
};

use common\entities\user\User;

class UserPasswordResetRequestService extends BaseService
{
    /**
     * @const CACHE_PREFIX
     */
    const CACHE_PREFIX = 'User:Password:Reset:Request:';

    /**
     * @const CACHE_STORAGE_TIME
     * 3600 - 1 hour
     */
    const CACHE_STORAGE_TIME = 3600;

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
     * @var array $params
     */
    private $params;

    /**
     * UserPasswordRecoveryService constructor.
     */
    public function __construct()
    {
        $this->mailer       = Yii::$app->mailer;
        $this->security     = Yii::$app->security;
        $this->cache        = Yii::$app->cache;

        $params             = [];
        $params['from']     = Yii::$app->params['emails.noreply'];
        $params['subject']  = Yii::t('mail/subject', 'Password recovery');

        $this->params       = $params;
    }

    /**
     * @param string $token
     * @return string
     */
    public static function getCacheKey($token)
    {
        return self::CACHE_PREFIX . $token;
    }

    /**
     * @param string $email
     * @throws NotFound
     * @throws UnknownErrorException
     */
    public function resetPassword(string $email)
    {
        if (!$user = User::find()->findByEmail($email)) {
            throw new NotFound();
        }

        $token  = $this->assignTokenWithUser($user);
        $this->sendEmail($user, $token);
    }

    /**
     * @param User $user
     * @param string $token
     * @throws UnknownErrorException
     */
    private function sendEmail(User $user, string $token)
    {
        $sent = $this->mailer
            ->compose('user/password-recovery', [
                'user'  => $user,
                'token' => $token,
            ])
            ->setTo($user->getEmail())
            ->setFrom($this->params['from'])
            ->setSubject($this->params['subject'])
            ->send()
        ;

        if (!$sent) {
            throw new UnknownErrorException('Could not send password reset request email.');
        }
    }

    /**
     * @param string $token
     * @return string|int
     * @throws NotFound
     */
    public function getRequestInitiatorId(string $token)
    {
        if (!$id = $this->cache->get(self::getCacheKey($token))) {
            throw new NotFound();
        }

        return $id;
    }

    /**
     * @param string $token
     * @return bool
     */
    public function isResetRequestExists(string $token)
    {
        return $this->cache->exists(self::getCacheKey($token));
    }

    /**
     * @param string $token
     * @return bool
     */
    public function deleteRequest(string $token)
    {
        return $this->cache->delete(self::getCacheKey($token));
    }

    /**
     * @param User $user
     * @return string
     */
    private function assignTokenWithUser(User $user): string
    {
        $token  = $this->security->generateRandomString();
        $key    = self::getCacheKey($token);

        $this->cache->add($key, $user->getId(), self::CACHE_STORAGE_TIME);

        return $token;
    }
}