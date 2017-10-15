<?php
namespace common\services\dto;

/**
 * Dto for UserPasswordRecoveryService.
 * @author Artem Rasskosov
 */

class UserPasswordRecoveryDto
{
    /**
     * @var string $emailTo
     */
    public $emailTo;

    /**
     * @var string $emailFrom
     */
    public $emailFrom;

    /**
     * @var string $subject
     */
    public $subject;
}
