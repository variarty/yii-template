<?php
namespace common\repositories;


/**
 * User repository interface.
 * @author Artem Rasskosov
 */

use common\entities\user\User;

interface UserRepositoryInterface
{
    /**
     * @param int|string $id
     * @return User
     */
    public function find($id): User;

    /**
     * @param string $email
     * @return User
     */
    public function findByEmail(string $email): User;
}
