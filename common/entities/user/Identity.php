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
        /** @var self $identity*/
        $identity = self::find()->findByAuthKey($token);

        return $identity;
    }

    /**
     * @param string $login
     * @return self
     */
    public static function findIdentityByLogin($login)
    {
        /** @var self $identity*/
        $identity = self::find()->findByLogin($login);

        return $identity;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
}
