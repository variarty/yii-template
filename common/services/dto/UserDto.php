<?php
namespace common\services\dto;

/**
 * @author Artem Rasskosov
 * @since 06.08.2017
 */

class UserDto
{
    /**
     * @var int $id
     */
    public $id;

    /**
     * @var string $login
     */
    public $email;

    /**
     * @var string $password
     */
    public $password;

    /**
     * @var string $authKey
     */
    public $authKey;

    /**
     * @var string $name
     */
    public $name;

    /**
     * @var string $surname
     */
    public $surname;
}
