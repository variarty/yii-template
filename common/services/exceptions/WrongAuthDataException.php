<?php
namespace common\services\exceptions;

/**
 * @author Artem Rasskosov
 * @since 16.07.2017
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
