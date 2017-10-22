<?php
namespace common\services\dto;

/**
 * Reset user password user dto.
 * @author Artem Rasskosov
 */

class UserPasswordResetDto
{
    /**
     * @var string $token
     */
    public $token;

    /**
     * @var string $password
     */
    public $password;
}
