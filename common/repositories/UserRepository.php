<?php
namespace common\repositories;


/**
 * User repository.
 * @author Artem Rasskosov
 */

use common\entities\user\User;
use common\repositories\exceptions\UserNotFoundException;

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
}
