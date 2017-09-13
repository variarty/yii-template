<?php
namespace common\services\dto;

/**
 * Dto for UserAuthService.
 * @author Artem Rasskosov
 */

class UserAuthDto
{
    /**
     * @var string $login
     */
    public $login;

    /**
     * @var string $password
     */
    public $password;

    /**
     * @var bool $rememberMe
     */
    public $rememberMe;
}
