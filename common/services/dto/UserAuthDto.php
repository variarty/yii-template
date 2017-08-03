<?php
namespace common\services\dto;

/**
 * @author Artem Rasskosov
 * @since 16.07.2017
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
