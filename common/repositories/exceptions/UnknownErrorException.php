<?php
namespace common\repositories\exceptions;

/**
 * Unknown error.
 * @author Artem Rasskosov
 */

class UnknownErrorException extends BaseException
{
    /**
     * @inheritdoc
     */
    public function __construct($message = null)
    {
        parent::__construct($message ?? 'Unknown error');
    }
}
