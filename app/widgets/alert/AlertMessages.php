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
     * AlertMessages constructor.
     */
    public static function getMessages()
    {
        static $messages;

        return $messages ?? $messages = require_once 'messages.php';
    }

    /**
     * @param string $key
     * @return bool
     */
    public static function isExists(string $key)
    {
        return isset(self::getMessages()[$key]);
    }

    /**
     * @param string $key
     * @return stdClass
     * @throws AlertMessageNotFoundException
     */
    public static function get(string $key): stdClass
    {
        if (self::isExists($key)) {
            $msg = self::getMessages()[$key];
            $dto = new stdClass();

            $dto->type = $msg['type'];
            $dto->text = Yii::t($msg['category'], $msg['text']);

            return $dto;
        }

        throw new AlertMessageNotFoundException($key);
    }
}
