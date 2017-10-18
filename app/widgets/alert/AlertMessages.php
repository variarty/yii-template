<?php
namespace app\widgets\alert;

/**
 * Store some messages by key.
 * @author Artem Rasskosov
 */

use Yii;
use stdClass;

class AlertMessages
{
    /**
     * @var array $messages
     */
    private static $messages = [
        // Errors
        'wrongAuthData' => [
            'category' => 'app/error',
            'text' => 'Wrong login or password.',
            'type' => AlertType::ERROR,
        ],

        // Success
        'passwordChanged' => [
            'category' => 'app/msg',
            'text' => 'Password changed successfully.',
            'type' => AlertType::SUCCESS,
        ],

        'recoveryPasswordEmailSend' => [
            'category' => 'app/msg',
            'text' => 'Instructions for password recovery sent to you by email.',
            'type' => AlertType::SUCCESS,
        ],
    ];

    /**
     * @param string $key
     * @return bool
     */
    public static function isExists(string $key)
    {
        return isset(self::$messages[$key]);
    }

    /**
     * @param string $key
     * @return stdClass
     * @throws AlertMessageNotFoundException
     */
    public static function get(string $key): stdClass
    {
        if (self::isExists($key)) {
            $msg = self::$messages[$key];
            $dto = new stdClass();

            $dto->type = $msg['type'];
            $dto->text = Yii::t($msg['category'], $msg['text']);

            return $dto;
        }

        throw new AlertMessageNotFoundException($key);
    }
}
