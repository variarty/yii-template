<?php
namespace common\entities\user;

/**
 * Identity class for Yii.
 * @author Artem Rasskosov
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
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::findOne(['auth_key' => $token]);
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
