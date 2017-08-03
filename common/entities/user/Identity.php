<?php
namespace common\entities\user;

/**
 * @author Artem Rasskosov
 * @since 18.07.2017
 */

use yii\web\IdentityInterface;

class Identity extends User implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * @inheritdoc
     * @todo use Exception
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {

    }

    /**
     * @param string $login
     * @return self
     */
    public static function findIdentityByLogin($login)
    {
        return self::findOne(['email' => $login]);
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
}
