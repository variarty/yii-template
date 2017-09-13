<?php
namespace common\services\dto;

/**
 * Main user dto.
 * @author Artem Rasskosov
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
