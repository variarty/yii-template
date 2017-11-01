<?php
namespace common\services\exceptions;

/**
 * User already exist.
 * Main usage: UserRegistrationService.
 * @author Artem Rasskosov
 */

class UserAlreadyExistException extends BaseException
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct('User already exist');
    }
}
