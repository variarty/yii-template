<?php
namespace common\services\exceptions;

/**
 * Wrong auth data.
 * Main usage: UserAuthService.
 * @author Artem Rasskosov
 */

class WrongAuthDataException extends BaseException
{
    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct('Wrong auth data');
    }
}
