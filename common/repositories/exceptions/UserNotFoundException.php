<?php
namespace common\repositories\exceptions;

/**
 * User not found.
 * Main usage: UserRepository.
 * @author Artem Rasskosov
 */

class UserNotFoundException extends BaseException
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct('User not found');
    }
}
