<?php
namespace common\services\exceptions;

/**
 * User not found.
 * Main usage: UserPasswordRecoveryService.
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
