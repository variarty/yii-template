<?php
namespace app\widgets\alert;

/**
 * Alert message exception.
 * @author Artem Rasskosov
 */

use Exception;

class AlertMessageNotFoundException extends Exception
{
    /**
     * AlertMessageNotFoundException constructor.
     * @param string $messageKey
     */
    public function __construct($messageKey)
    {
        parent::__construct("'$messageKey' not found");
    }
}
