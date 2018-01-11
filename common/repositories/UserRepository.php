<?php
namespace common\repositories;

/**
 * User repository.
 * @author Artem Rasskosov
 */

use Exception;
use yii\db\ActiveRecord;
use common\entities\user\User;

use common\repositories\exceptions\{
    UserNotFoundException,
    UnknownErrorException
};

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * @param int|string $id
     * @return User
     *
     * @throws UserNotFoundException
     */
    public function find($id): User
    {
        if (!$user = User::findOne($id)) {
            throw new UserNotFoundException();
        }

        return $user;
    }

    /**
     * @param string $email
     * @return User
     *
     * @throws UserNotFoundException
     */
    public function findByEmail(string $email): User
    {
        if (!$user = User::findOne(['email' => $email])) {
            throw new UserNotFoundException();
        }

        return $user;
    }

    /**
     * @param string $login
     * @return User
     */
    public function findByLogin(string $login): User
    {
        return $this->findByEmail($login);
    }

    /**
     * @param string $login
     * @return bool
     */
    public function isUserExist($login): bool
    {
        $count = User::find()
            ->where(['email' => $login])
            ->count('id')
        ;

        return $count ? true : false;
    }

    /**
     * @param User $user
     * @return User
     */
    public function save(User $user): User
    {
        if (!$user instanceof ActiveRecord) {
            throw new Exception('User must be instance of ActiveRecord.');
        }

        if (!$user->save(false)) {
            throw new UnknownErrorException('Could not save user entity.');
        }

        return $user;
    }
}
