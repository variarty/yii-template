<?php
namespace common\services\exceptions;

/**
 * Wrong auth data.
 * Main usage: UserAuthService.
 * @author Artem Rasskosov
 */

use Exception;

class WrongAuthDataException extends Exception
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct('Wrong auth data');
    }
}
