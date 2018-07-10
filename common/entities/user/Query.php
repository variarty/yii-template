<?php
namespace common\entities\user;

/**
 * User active query.
 * @author Artem Rasskosov
 */

use yii\db\ActiveQuery;

class Query extends ActiveQuery
{
    public function isUserExist(string $login): bool
    {
        $count = $this
            ->where(['email' => $login])
            ->count('id')
        ;

        return $count ? true : false;
    }

    public function findByEmail(string $email): User
    {
        /** @var User $user */
        $user = $this
            ->where(['email' => $email])
            ->one()
        ;

        return $user;
    }

    public function findByAuthKey(string $authKey): User
    {
        /** @var User $user */
        $user = $this
            ->where(['auth_key' => $authKey])
            ->one()
        ;

        return $user;
    }

    public function findByLogin(string $login): User
    {
        return $this->findByEmail($login);
    }
}
